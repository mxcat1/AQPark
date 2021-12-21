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
            'direccion_1' => 'required|string|max:150',
            'referencia_1' => 'required|string|max:150',
            'nombreparking' => 'required|string|max:60',

        ]);

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->direccion=$request->direccion_1;
        $parking->referencia=$request->referencia_1;
        $parking->nombre=$request->nombreparking;
        $parking->save();
        return redirect()->back()->with('success', 'Datos actualizados actualizada');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');        
    }

    public function updatehorario(Request $request, $estacionamiento_ID)
    {
        $request->validate([
            'horainicio' => 'required|string|max:10',
            'horafin' => 'required|string|max:10',

        ]);

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->apertura=$request->horainicio;
        $parking->cierre=$request->horafin;
        $parking->update();
        return redirect()->back()->with('success', 'Horario de atención actualizado');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');        
    }

    public function updateprice(Request $request, $estacionamiento_ID)
    {
        $request->validate([
            'pricepark' => 'required|numeric',

        ]);

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->precio=$request->pricepark;
        $parking->update();
        return redirect()->back()->with('success', 'Precio actualizado');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');        
    }

    public function updatecapacidad(Request $request, $estacionamiento_ID)
    {
        $request->validate([
            'capacidadpark' => 'required|numeric',

        ]);

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->capacidad=$request->capacidadpark;
        $parking->update();
        return redirect()->back()->with('success', 'Se actualizo la capacidad');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');        
    }

    public function updatefoto(Request $request, $estacionamiento_ID)
    {
        $request->validate([
            'fotoparking' => 'image|max:5120',

        ]);

        if ($imagen2 = $request->file('fotoparking')) {
            $destino2 = 'images/usuarioimg';
            $nombreimagen2 = $request->nomEstacionamiento . date('YmdHis') . '.' . $imagen2->getClientOriginalExtension();
            $imagen2->move($destino2, $nombreimagen2);
        }

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->foto=$nombreimagen2;
        $parking->update();
        return redirect()->back()->with('success', 'Se actualizo la foto del estacionamiento');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');        
    }

    public function updatespaces(Request $request, $estacionamiento_ID)
    {
        $request->validate([
            'espaciosfree' => 'required|numeric',

        ]);

        $parking=Estacionamiento::findOrFail($estacionamiento_ID);
        $parking->capacidad_actual=$request->espaciosfree;
        $parking->update();
        return redirect()->back()->with('success', 'Se actualizo los espacios libres');
        // return redirect()->route('estacionamiento.descripcion', $estacionamiento_ID)->with('success', 'Dirección actualizada');        
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
