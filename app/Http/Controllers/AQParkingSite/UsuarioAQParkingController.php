<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\TipoDocumento;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class UsuarioAQParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('AQParkingSite.Index.principal');
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
            'nombre' => 'required|string|max:150',
            'apellido' => 'required|string|max:150',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'foto' => 'image|max:5120',
            'tipo_documento' => 'required|exists:tipo_documentos,tipo_docu_ID',
            'documento' => 'required|max:10',            
            // 'rol' => ['required', Rule::in(['Usuario Natural', 'Administrador Estacionamiento', 'Administrador Sistema'])],
            'telefono' => 'digits:9',
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
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
            'tipo_docu_ID' => $request->tipo_documento,
            'documento' => $request->documento,            
            'rol' => 'Usuario Natural',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($usuarionuevo));

        return redirect()->route('indexAQParking')->with('success', 'Nuevo Usuario Creado');
    }

    public function restore()
    {
        //
        return view('AQParkingSite.Usuario.recuperacion-cuenta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show()
    // public function show($id)
    {
        //
        return view('AQParkingSite.Usuario.cuenta-usuario');
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
