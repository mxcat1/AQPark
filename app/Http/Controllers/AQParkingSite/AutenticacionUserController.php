<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AutenticacionUserController extends Controller
{
    public function login()
    {
        return view('AQParkingSite.Index.login');
    }

    public function autenticacion(Request $request)
    {        
        $credenciales = $request->validate([
            'email' => ['required', 'email','exists:usuarios'],
            'password' => ['required']
        ]);
        $usuario = Usuario::where('email',$credenciales['email'])->first();        
            if (Auth::attempt($credenciales)) {
                $request->session()->regenerate();
                return view('AQParkingSite.Index.principal');
            }
        
        return back()->withErrors([
            'email' => 'Usuario y Contraseña proporcionadas no coinciden con nuestros registros.'
        ]);
    }
}
