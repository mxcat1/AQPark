<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Estacionamiento;
use App\Models\Vehiculo;
use App\Models\TipoDocumento;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

// use Carbon\Carbon;


class UsuarioAQParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buscar = trim($request->get('buscar'));
        $parkingLots=Estacionamiento::where('nombre','like','%'.$buscar.'%')->get();
        return view('AQParkingSite.Index.principal', compact('parkingLots'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function registro()
    {
        //
        $listadocu = TipoDocumento::all();
        return view('AQParkingSite.Registro.registro-usuario', compact('listadocu'));
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
            'tipo_documento' => 'required|exists:tipo_documentos,tipo_docu_ID',
            'documento' => 'required|digits_between:8,9|unique:usuarios',            
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
            'tipo_docu_ID' => $request->tipo_documento,
            'documento' => $request->documento,            
            'rol' => 'Usuario Natural',
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($usuarionuevo));

        return redirect()->route('indexAQParking')->with('success', 'Nuevo Usuario Creado');
    }

    public function store_auto(Request $request){
        $request->validate([
            'marcaVehiculo' => 'required|string|max:30',
            'modeloVehiculo' => 'required|string|max:30',
            'colorVehiculo' => 'required|string|max:30',
            'placaVehiculo' => 'required|regex:/^[A-Z]{3}[-][0-9]{3}$/',
        ]);

        Vehiculo::create([
            'usuario_ID' => Auth::user()->usuario_ID,
            'marca' => $request->marcaVehiculo,
            'modelo' => $request->modeloVehiculo,
            'color' => $request->colorVehiculo,
            'placa' => $request->placaVehiculo,
        ]);

        return redirect()->back()->with('success', 'Vehiculo Registrado');
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
    {
        $usuarioselec = Usuario::find(Auth::user()->usuario_ID);
        return view('AQParkingSite.Usuario.cuenta-usuario', compact('usuarioselec'));
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
        $request->validate([
            'nombre' => 'required|string|max:45',
            'apellido' => 'required|string|max:45',
            'telefono' => 'digits:9',
            'foto' => 'image|max:5120',
        ]);

        if ($usuario = Usuario::find($id)) {

            if((Carbon::now())->diffInSeconds(Carbon::parse($usuario->updated_at))>20){
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
                return redirect()->route('cuenta-usuarioAQParking')->with('success', 'Se Actualizo correctamente los datos del Usuario');
            }else {
                return redirect()->route('cuenta-usuarioAQParking')->with('success delete', 'El Usuario se actualizo hace poco revise antes de actualizar de nuevo');
            }
        } else {
            return redirect()->route('cuenta-usuarioAQParking')->with('success', 'Usuario Eliminado anteriormente no se efectuo la actualizacion');
        }
    }

    public function changepassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'regex:/^\S+$/', 'confirmed', Rules\Password::defaults()]
        ]);
        if($usuariocontraseña = Usuario::find($id)){
            $usuariocontraseña->update(['password'=>Hash::make($request->password)]);
            return redirect()->route('cuenta-usuarioAQParking')->with('success', 'Se Actualizo correctamente la contraseña del Usuario');
        }else{
            return redirect()->route('cuenta-usuarioAQParking')->with('success', 'Usuario Eliminado anteriormente no se efectuo la actualizacion');
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

    public function vehiculo_destroy($id)
    {
        $vehiculo = Vehiculo::find($id);
        $vehiculo->delete();
        return redirect()->route('cuenta-usuarioAQParking')->with('success delete', 'Se Elimino correctamente el Vehiculo');
    }
}
