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
use Illuminate\Validation\Rule;
use DateTime;

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
                    'vehiculo_ID' => $request->vehiculoRegistrado,

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
        $listausuarios = Usuario::where('rol', 'Usuario Natural')->get();
        $listaestacionamientos = Estacionamiento::all();
        $reservaeditar=Reserva::find($id);
        return view('AQParkingSite.Estacionamiento.edicion-resserva', compact('listausuarios','listaestacionamientos','reservaeditar'));
        // $reserva=Reserva::find($id_reserva);
        // return view('AQParkingSite.Estacionamiento.edicion-resserva', compact('reserva'));       
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
        $request->validate([
            // 'ingreso_vehiculo'=>['required','date'],
            'estado'=>['required_if:estado,!=,Reserva Concluida','string',Rule::in(['Reservado', 'Reserva en Espera', 'Reserva Activa','Reserva Concluida'])]
        ]);

        //Logica para calcular el precio total de la reserva
        $ingreso_vehiculo=new DateTime($request->ingreso_vehiculo);
        $salida_vehiculo=null;
        $estacionamiento=Estacionamiento::find($request->estacionamiento);
        $precio_total=0;
        $horas_entre_fechas=0;
        $salida_vehiculo=new DateTime($request->salida_vehiculo);
        $diferenciahoras=$salida_vehiculo->diff($ingreso_vehiculo);
        if ($diferenciahoras->i>=30){
            $horas_entre_fechas++;
        }
        // if ($request->salida_vehiculo){
        //     $request->validate(['salida_vehiculo'=>['date','after_or_equal:ingreso_vehiculo']]);
        //     $salida_vehiculo=new DateTime($request->salida_vehiculo);
        //     $diferenciahoras=$salida_vehiculo->diff($ingreso_vehiculo);
        //     $horas_entre_fechas=$diferenciahoras->h;
        //     if ($diferenciahoras->i>=30){
        //         $horas_entre_fechas++;
        //     }
        //     $precio_total=(double)($estacionamiento->precio)*$horas_entre_fechas;
        // }

        $reservaedit=Reserva::find($id);
        $reservaedit->update([

            'ingreso' => $request->ingreso_vehiculo,
            'salida' => $salida_vehiculo,
            'cantidad_horas' => $horas_entre_fechas,
            //  'precio_total' => $precio_total,
            'estado' => $request->estado?$request->estado:$reservaedit->estado
            ]);
            // if ($request->estado=='Reserva Concluida'){
            //     $capacidad_actual=$estacionamiento->capacidad_actual;
            //     $estacionamiento->update([
            //         'capacidad_actual' => $capacidad_actual+1
            //     ]);
            // }
        // if ($request->estado=='Reserva Concluida'){
        //     $parking=Estacionamiento::findOrFail($request->estacionamiento);
        //     $parking->update([
        //         'capacidad_actual' => $parking->capacidad_actual + 1,

        //     ]);
        // }
    

        return redirect()->route('control-reservasAQParking',Crypt::encrypt(Auth::user()->usuario_ID))->with('success','Los Datos de la Reserva se Editaron con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $reservadelete=Reserva::find($id);
        $reservadelete->delete();
        return redirect()->route('control-reservasAQParking',Crypt::encrypt(Auth::user()->usuario_ID))->with('success delete','Se Elimino correctamente la Reserva');
    }
}
