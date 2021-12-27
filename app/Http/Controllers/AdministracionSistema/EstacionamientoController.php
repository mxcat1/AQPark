<?php

namespace App\Http\Controllers\AdministracionSistema;

use App\Http\Controllers\Controller;
use App\Models\Estacionamiento;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EstacionamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listaestacionamientos = Estacionamiento::paginate();
        return view('AQParkingAdmin.Estacionamiento.index', compact('listaestacionamientos'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listadousuarios = Usuario::where('rol', 'Administrador Estacionamiento')->get();
        return view('AQParkingAdmin.Estacionamiento.create', compact('listadousuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreimagen = 'imagenestacionamiento.jpg';

        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|min:9|max:12|regex:/^[0-9]{8,12}$/',
            'direccion' => 'required|string|max:255',
            'referencia' => 'string|max:255',
            'distrito' => 'required|string|max:255',
            'capacidad' => 'required|numeric|between:0,1000',
            'apertura' => 'required|date_format:H:i',
            'cierre' => 'required|date_format:H:i',
            'estado' => ['required', Rule::in(['Activo', 'Clausurado', 'Sin Servicio', 'Abierto', 'Cerrado', 'Falta Verificar'])],
            'precio' => 'required|between:0,99.9999',
            'propietario' => [
                'required',
                Rule::exists('usuarios', 'usuario_ID')->where(function ($query) {
                    return $query->where('rol', 'Administrador Estacionamiento');
                }),
            ],
            'foto' => 'required|image|max:5120',
            'longitud' => 'required|between:-999.999999999999999,999.999999999999999',
            'latitud' => 'required|between:-999.999999999999999,999.999999999999999',
        ]);
        if ($imagen = $request->file('foto')) {
            $destino = 'images/estacionamientos';
            $nombreimagen = $request->nombre . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($destino, $nombreimagen);
        }
        $estacionamientonuevo = Estacionamiento::create([
            'nombre' => $request->nombre,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'referencia' => $request->referencia,
            'distrito' => $request->distrito,
            'capacidad' => $request->capacidad,
            'capacidad_actual' => $request->capacidad,
            'apertura' => $request->apertura,
            'cierre' => $request->cierre,
            'estado' => $request->estado,
            'precio' => $request->precio,
            'usuario_ID' => $request->propietario,
            'foto' => $nombreimagen,
            'longitud' => $request->longitud,
            'latitud' => $request->latitud
        ]);
        return redirect()->route('Estacionamiento.index')->with('success', 'Nuevo Estacionamiento Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $estacionamientomostrar = Estacionamiento::find($id);
        return view('AQParkingAdmin.Estacionamiento.show', compact('estacionamientomostrar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estacionamientoedit = Estacionamiento::find($id);
        $listadousuarios = Usuario::where('rol', 'Administrador Estacionamiento')->get();
        return view('AQParkingAdmin.Estacionamiento.edit', compact('estacionamientoedit', 'listadousuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'telefono' => 'required|string|min:9|max:12|regex:/^[0-9]{9,12}$/',
            'direccion' => 'required|string|max:255',
            'referencia' => 'string|max:255',
            'distrito' => 'required|string|max:255',
            'capacidad' => 'required|numeric|between:0,1000',
            'apertura' => 'required|date_format:H:i',
            'cierre' => 'required|date_format:H:i',
            'estado' => ['required', Rule::in(['Activo', 'Clausurado', 'Sin Servicio', 'Abierto', 'Cerrado', 'Falta Verificar'])],
            'precio' => 'required|between:0,99.9999',
            'propietario' => [
                'required',
                Rule::exists('usuarios', 'usuario_ID')->where(function ($query) {
                    return $query->where('rol', 'Administrador Estacionamiento');
                }),
            ],
            'foto' => 'image|max:5120',
            'longitud' => 'required|between:-999.999999999999999,999.999999999999999',
            'latitud' => 'required|between:-999.999999999999999,999.999999999999999',
        ]);
        if ($estacionamientoupdate = Estacionamiento::find($id)) {
            $datosestacionamientoedit = $request->all();
            if ($imagen = $request->file('foto')) {
                $destino = 'images/estacionamientos';
                $nombreimagen = $request->nombre . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
                $imagen->move($destino, $nombreimagen);
                $datosestacionamientoedit['foto'] = $nombreimagen;
                if (file_exists($destino . $estacionamientoupdate->foto)) {
                    unlink($destino . $estacionamientoupdate->foto);
                }
            } else {
                unset($datosestacionamientoedit['foto']);
            }
            $datosestacionamientoedit['usuario_ID'] = $request['propietario'];
            $estacionamientoupdate->update($datosestacionamientoedit);
            return redirect()->route('Estacionamiento.index')->with('success', 'Datos del Estacionamiento Actualizados con exito');
        } else {
            return redirect()->route('Estacionamiento.index')->with('success', 'Estacionamiento Eliminado anteriormente, no se efectuo la actualizacion');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $estacionamientodelete = Estacionamiento::find($id);
        $estacionamientodelete->delete();
        if (file_exists('images/estacionamientos/' . $estacionamientodelete->foto)) {
            unlink('images/estacionamientos/' . $estacionamientodelete->foto);
        }
        return redirect()->route('Estacionamiento.index')->with('success', 'Se Elimino correctamente el Estacionamiento');
    }
}
