<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuarioEstacionamiento
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
        if (Auth::check() && Auth::user()->rol=='Administrador Estacionamiento') {
            return $next($request);
        }
        if (Auth::check() && Auth::user()->rol=='Usuario Natural') {
            return redirect()->route('main-pageAQParking');
        }
        if (! Auth::check() ) {
            return redirect()->route('indexAQParking');
        }
        abort(404);
    }
}
