<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AQParkingController extends Controller
{
    public function index()
    {
        return view('AQParkingSite.main');
    }

    public function registro()
    {
        return view('AQParkingSite.Registro.registro');
    }

    public function cookies()
    {
        return view('AQParkingSite.Footer.politica-cookies');
    }

    public function privacidad()
    {
        return view('AQParkingSite.Footer.politica-privacidad');
    }

    public function terminos()
    {
        return view('AQParkingSite.Footer.terminos-condiciones');
    }
}