<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Estacionamiento;
use App\Models\TipoDocumento;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class RegistroParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('AQParkingSite.Registro.registro-estacionamiento');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreimagen = 'foto-perfil.jpg';
        $request->validate([
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'email' => 'required|string|email|max:76|unique:usuarios',
            'foto' => 'image|max:5120',
            'documento' => 'required|digits:11|unique:usuarios',
            'telefono' => 'digits:9',
            'password' => ['required','regex:/^\S+$/', 'confirmed', Rules\Password::defaults()],

            //ESTACIONAMIENTO
            'nomEstacionamiento' => 'required|string|max:60',
            'dirEstacionamiento' => 'required|string|max:120',
            'telEstacionamiento' => 'required|digits:9',
            'fotoEstacionamiento' => 'image|max:5120',
            'refEstacionamiento' => 'required|string|max:120',
            'precioEstacionamiento' => 'required|numeric|min:0',
            'capEstacionamiento' => 'required|numeric|min:0',
            'horarioApertura' => 'required|string|max:5',
            'horarioCierre' => 'required|string|max:5',
            'distrito' => 'required|string|max:255',
            'longitud' => 'required|between:-999.999999999999999,999.999999999999999',
            'latitud' => 'required|between:-999.999999999999999,999.999999999999999',
        ]);



        try{
         DB::transaction(function () use ($request) {

            if ($imagen = $request->file('foto')) {
                $destino = 'images/usuarioimg';
                $nombreimagen = $request->nombre . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
                $imagen->move($destino, $nombreimagen);
            }

            if ($imagen2 = $request->file('fotoEstacionamiento')) {
                $destino2 = 'images/estacionamientos';
                $nombreimagen2 = $request->nomEstacionamiento . date('YmdHis') . '.' . $imagen2->getClientOriginalExtension();
                $imagen2->move($destino2, $nombreimagen2);
            }

            $usuarionuevo = Usuario::create([
                'nombre' => $request->nombre,
                'apellido' => $request->apellido,
                'email' => $request->email,
                'foto' => $nombreimagen,
                'telefono' => $request->telefono,
                'tipo_docu_ID' => 2,
                'documento' => $request->documento,
                'rol' => 'Administrador Estacionamiento',
                'password' => Hash::make($request->password),
            ]);

            $parkingnuevo = Estacionamiento::create([
                'nombre' => $request->nomEstacionamiento,
                'telefono' => $request->telEstacionamiento,
                'direccion' => $request->dirEstacionamiento,
                'referencia' => $request->refEstacionamiento,
                'precio' => $request->precioEstacionamiento,
                'capacidad' => $request->capEstacionamiento,
                'apertura' => $request->horarioApertura,
                'cierre' => $request->horarioCierre,
                'distrito' => $request->distrito,
                'foto' => $nombreimagen2,
                'capacidad_actual' => $request->capEstacionamiento,
                'usuario_ID' => $usuarionuevo->usuario_ID,
                'longitud'=> $request->longitud,
                'latitud' => $request->latitud,
            ]);
            event(new Registered($usuarionuevo));
        });
        } catch (\Exception $e) {
            // return redirect()->back()->with('success delete', 'Error al registrar el Estacionamiento');
            return redirect()->route('indexAQParking')->with('success delete', 'Error al registrar el Usuario y el Estacionamiento');
        }
        return redirect()->route('indexAQParking')->with('success', 'Nuevo Usuario y Estacionamiento Creados');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function storeuser(Request $request)
    {
        $nombreimagen = 'foto-perfil.jpg';
        $request->validate([
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'email' => 'required|string|email|max:76|unique:usuarios',
            'foto' => 'image|max:5120',
            // 'tipo_documento' => 'required|exists:tipo_documentos,tipo_docu_ID',
            'documento' => 'required|digits:11|unique:usuarios',
            // 'rol' => ['required', Rule::in(['Usuario Natural', 'Administrador Estacionamiento', 'Administrador Sistema'])],
            'telefono' => 'digits:9',
            'password' => ['required','regex:/^\S+$/', 'confirmed', Rules\Password::defaults()]
        ]);

        if ($imagen = $request->file('foto')) {
            $destino = 'images/usuarioimg';
            $nombreimagen = $request->nombre . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
            $imagen->move($destino, $nombreimagen);
        }

        $usuarionuevo = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'foto' => $nombreimagen,
            'telefono' => $request->telefono,
            'tipo_docu_ID' => 2,
            'documento' => $request->documento,
            'rol' => 'Administrador Estacionamiento',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($usuarionuevo));

        return redirect()->route('indexAQParking')->with('success', 'Nuevo Usuario Creado');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
