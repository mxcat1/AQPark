<?php

namespace App\Http\Controllers\AdministracionSistema;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Vehiculo;
use Illuminate\Http\Request;

class VehiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listavehiculos = Vehiculo::paginate();
        return view('AQParkingAdmin.Vehiculo.index',compact('listavehiculos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listadousuarios = Usuario::where('rol','Usuario Natural')->get();
        return view('AQParkingAdmin.Vehiculo.create',compact('listadousuarios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'modelo' => 'required|string|max:150',
            'marca' => 'required|string|max:150',
            'color' => 'required|string|max:100',
            'placa' => 'required|string|min:7|regex:/^[A-Z0-9]{3}-[0-9]{3}$/',
            'usuario' => 'required|exists:usuarios,usuario_ID',
        ]);

        $vehiculonuevo=Vehiculo::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'color' => $request->color,
            'placa' => $request->placa,
            'usuario_ID' => $request->usuario
        ]);

        return redirect()->route('Vehiculo.index')->with('success', 'Nuevo Vehiculo Registrado');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vehiculoedit = Vehiculo::find($id);
        $listadousuarios = Usuario::where('rol','Usuario Natural')->get();
        return view('AQParkingAdmin.Vehiculo.edit',compact('listadousuarios','vehiculoedit'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'modelo' => 'required|string|max:150',
            'marca' => 'required|string|max:150',
            'color' => 'required|string|max:100',
            'placa' => 'required|string|min:7|regex:/^[A-Z0-9]{3}-[0-9]{3}$/',
            'usuario' => 'required|exists:usuarios,usuario_ID',
        ]);
        if($vehiculo = Vehiculo::find($id)){
            $vehiculo->update([
                'marca' => $request->marca,
                'modelo' => $request->modelo,
                'color' => $request->color,
                'placa' => $request->placa,
                'usuario_ID' => $request->usuario
            ]);
            return redirect()->route('Vehiculo.index')->with('success', 'Se Actualizo correctamente los datos del Vehiculo');
        }else{
            return redirect()->route('Vehiculo.index')->with('success', 'Vehiculo Eliminado anteriormente no se efectuo la actualizacion');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
