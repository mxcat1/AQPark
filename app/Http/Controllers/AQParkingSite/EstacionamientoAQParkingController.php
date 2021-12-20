<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use App\Models\Estacionamiento;
use App\Models\Usuario;
use Illuminate\Http\Request;

class EstacionamientoAQParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function details($estacionamiento_ID)
    {
        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        return view('AQParkingSite.Estacionamiento.estacionamiento-descripcion', compact('parking'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function updatedireccion(Request $request, $estacionamiento_ID)
    {
        $request->validate([
            'routepark' => 'required|string|max:150',
            'refepark' => 'required|string|max:150',

        ]);

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->direccion=$request->routepark;
        $parking->referencia=$request->refepark;
        $parking->save();
        return redirect()->back()->with('success', 'Dirección actualizada');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');

        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

    public function show($usuario_ID)
    {
        $parking=Estacionamiento::findOrFail(Estacionamiento::where('usuario_ID',$usuario_ID)->first()->estacionamiento_ID);
        return view('AQParkingSite.Estacionamiento.cuenta-estacionamiento', compact('parking'));
    }

    public function control($usuario_ID)
    {
        $parking=Estacionamiento::findOrFail(Estacionamiento::where('usuario_ID',$usuario_ID)->first()->estacionamiento_ID);
        return view('AQParkingSite.Estacionamiento.control-reservas', compact('parking'));
        
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
        //
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
}
