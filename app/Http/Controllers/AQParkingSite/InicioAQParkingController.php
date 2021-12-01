<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InicioAQParkingController extends Controller
{
    public function index()
    {
        return view('AQParkingSite.main');
    }
}
