<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AutenticasionUserController extends Controller
{
    public function login()
    {
        return view('AQParkingSite.Index.login')->name('LoginUsers');
    }
}
