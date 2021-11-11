<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioRolVerificacion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->rol=='Administrador Sistema') {
            return $next($request);
        }
        if (! Auth::check() ) {
            return redirect()->route('LoginAdministrador');
        }
        abort(404);
    }
}
