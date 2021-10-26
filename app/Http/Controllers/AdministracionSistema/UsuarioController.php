<?php

namespace App\Http\Controllers\AdministracionSistema;

use App\Http\Controllers\Controller;
use App\Models\TipoDocumento;
use App\Models\Usuario;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listausuarios = Usuario::paginate();
        return view('AQParkingAdmin.Usuario.index', compact('listausuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listadocu = TipoDocumento::all();
        return view('AQParkingAdmin.Usuario.create', compact('listadocu'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nombreimagen = 'foto-perfil.jpg';
        $request->validate([
            'nombre' => 'required|string|max:150',
            'apellido' => 'required|string|max:150',
            'email' => 'required|string|email|max:255|unique:usuarios',
            'telefono' => 'digits_between:8,12',
            'tipo_documento' => 'required|exists:tipo_documentos,tipo_docu_ID',
            'documento' => 'required|max:50',
            'foto' => 'image|max:5120',
            'rol' => ['required', Rule::in(['Usuario Natural', 'Administrador Estacionamiento', 'Administrador Sistema'])],
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
            'telefono' => $request->telefono,
            'tipo_docu_ID' => $request->tipo_documento,
            'documento' => $request->documento,
            'foto' => $nombreimagen,
            'rol'=>$request->rol,
            'password'=> Hash::make($request->password),
        ]);

        event(new Registered($usuarionuevo));

        return redirect()->route('Usuario.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarioselec=Usuario::find($id);
        return view('AQParkingAdmin.Usuario.show',compact('usuarioselec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioedit=Usuario::find($id);
        $listadocu = TipoDocumento::all();
        return view('AQParkingAdmin.Usuario.edit',compact('usuarioedit','listadocu'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
