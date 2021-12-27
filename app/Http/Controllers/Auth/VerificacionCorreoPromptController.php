<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificacionCorreoPromptController extends Controller
{
    public function __invoke(Request $request)
    {
        return $request->user()->hasVerifiedEmail()
//                    ? redirect()->intended(RouteServiceProvider::HOME)
            ? redirect('/')
            : view('auth.verificacion-correo');
    }
}
