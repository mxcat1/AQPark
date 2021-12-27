<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificacionCorreoController extends Controller
{
    public function __invoke(EmailVerificationRequest $request)
    {
        if ($request->user()->hasVerifiedEmail()) {
//            return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
            return redirect()->route('indexAQParking');
        }

        if ($request->user()->markEmailAsVerified()) {
            event(new Verified($request->user()));
        }

//        return redirect()->intended(RouteServiceProvider::HOME.'?verified=1');
        return redirect()->route('indexAQParking');
    }
}
