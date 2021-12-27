<?php

namespace App\Http\Controllers\AdministracionSistema;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AutenticateAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return view('AQParkingAdmin.Administrador.login');
    }


    /**
     * Login.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function autenticate(Request $request)
    {
        $credenciales = $request->validate([
            'email' => ['required', 'email', 'exists:usuarios'],
            'password' => ['required'],
        ]);
        $usuario = Usuario::where('email', $credenciales['email'])->first();

        $remember = false;
        if ($request['remember']) {
            $remember = true;
        }

        if ($usuario && $usuario->rol == 'Administrador Sistema') {
            if (Auth::attempt($credenciales, $remember)) {
                $request->session()->regenerate();
                return redirect()->route('inicio');
            }
        }
        return back()->withErrors([
            'email' => 'Usuario y Contraseña proporcionadas no coinciden con nuestros registros.'
        ]);
    }

    /**
     * Log the user out of the application.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('LoginAdministrador');
    }


}
