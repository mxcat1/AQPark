<?php

namespace App\Http\Controllers\AQParkingSite;

use App\Http\Controllers\Controller;
use App\Models\Usuario;
use App\Models\Estacionamiento;
use App\Models\Vehiculo;
use App\Models\Reserva;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class ReservaParkingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($estacionamiento_ID)
    {
        $id_parking = Crypt::decrypt($estacionamiento_ID);
        $parking=Estacionamiento::findOrFail($id_parking);
        $autos = Vehiculo::all();
        return view('AQParkingSite.Estacionamiento.estacionamiento-reserva', compact('parking', 'autos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function check($estacionamiento_ID)
    {
        $id_parking = Crypt::decrypt($estacionamiento_ID);
        $parking=Estacionamiento::findOrFail($id_parking);
        $fecha_actual = Carbon::now();
        return view('AQParkingSite.Estacionamiento.confirmacion-reserva', compact('parking', 'fecha_actual'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function store(Request $request)
    {
        $request->validate([
            'vehiculoRegistrado' => 'required',         
        ]);

        $parking=Estacionamiento::findOrFail($request->idParking);
        $capacidad=$parking->capacidad_actual;

        if($capacidad != 0){
            try{
                DB::transaction(function () use ($request) {
                    

                $reservanueva = Reserva::create([
                    'estacionamiento_ID' => $request->idParking,
                    'vehiculo_ID' => 1, $request->vehiculoRegistrado,
                    'fecha' => Carbon::now(),  
                ]);
                
                $parking=Estacionamiento::findOrFail($request->idParking);
                $parking->update([
                    'capacidad_actual' => $parking->capacidad_actual - 1,
                ]);

                // event(new Registered($reservanueva));

            });   
            }catch(\Exception $e){
                return redirect()->back()->with('success delete', 'Algo sucedio y no se pudo realizar la reserva');
            } 
            //return redirect()->back()->with('success', 'Reserva confirmada');
            return redirect()->route('reserva-confirmacion', Crypt::encrypt($request->idParking));
        }else{
            return redirect()->back()->with('success delete', 'No hay espacios disponibles');
        }    


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
