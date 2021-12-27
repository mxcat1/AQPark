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
            'documento' => 'required|max:50|unique:usuarios',
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
            'rol' => $request->rol,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($usuarionuevo));

        return redirect()->route('Usuario.index')->with('success', 'Nuevo Usuario Creado');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuarioselec = Usuario::find($id);
        return view('AQParkingAdmin.Usuario.show', compact('usuarioselec'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $usuarioedit = Usuario::find($id);
        $listadocu = TipoDocumento::all();
        return view('AQParkingAdmin.Usuario.edit', compact('usuarioedit', 'listadocu'));
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
            'nombre' => 'required|string|max:150',
            'apellido' => 'required|string|max:150',
            'email' => 'required|string|email|max:255',
            'telefono' => 'digits_between:8,12',
            'foto' => 'image|max:5120',
            'rol' => ['required', Rule::in(['Usuario Natural', 'Administrador Estacionamiento', 'Administrador Sistema'])],
        ]);

        if ($usuario = Usuario::find($id)) {
            $editarusuario = $request->all();

            if ($imagen = $request->file('foto')) {
                $destino = 'images/usuarioimg/';
                $nombreimagen = $request->nombre . date('YmdHis') . '.' . $imagen->getClientOriginalExtension();
                $imagen->move($destino, $nombreimagen);
                $editarusuario['foto'] = $nombreimagen;
                if (file_exists($destino . $usuario->foto)) {
                    unlink($destino . $usuario->foto);
                }
            } else {
                unset($editarusuario['foto']);
            }
            $usuario->update($editarusuario);
            return redirect()->route('Usuario.index')->with('success', 'Se Actualizo correctamente los datos del Usuario');
        } else {
            return redirect()->route('Usuario.index')->with('success', 'Usuario Eliminado anteriormente no se efectuo la actualizacion');
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
        $usuario = Usuario::find($id);
        $usuario->delete();
        if (file_exists('images/usuarioimg/' . $usuario->foto)) {
            unlink('images/usuarioimg/' . $usuario->foto);
        }
        return redirect()->route('Usuario.index')->with('success delete', 'Se Elimino correctamente el Usuario');
    }

    /**
     * Cambiar contraseña del usuario vista
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function cambiarpasswordvista($id)
    {
        $usuariocontraseña = Usuario::find($id);
        return view('AQParkingAdmin.Usuario.editpassword', compact('usuariocontraseña'));
    }

    /**
     * Cambiar contraseña del usuario vista
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function cambiarpassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()]
        ]);
        if($usuariocontraseña = Usuario::find($id)){
            $usuariocontraseña->update(['password'=>Hash::make($request->password)]);
            return redirect()->route('Usuario.index')->with('success', 'Se Actualizo correctamente la contraseña del Usuario');
        }else{
            return redirect()->route('Usuario.index')->with('success', 'Usuario Eliminado anteriormente no se efectuo la actualizacion');
        }

    }

}
