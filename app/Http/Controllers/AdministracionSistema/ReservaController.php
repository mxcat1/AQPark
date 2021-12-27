<?php

namespace App\Http\Controllers\AdministracionSistema;

use App\Http\Controllers\Controller;
use App\Models\Estacionamiento;
use App\Models\Reserva;
use App\Models\Usuario;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservaslista = Reserva::paginate();
        return view('AQParkingAdmin.Reserva.index',compact('reservaslista'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $listausuarios = Usuario::where('rol', 'Usuario Natural')->get();
        $listaestacionamientos = Estacionamiento::all();
        return view('AQParkingAdmin.Reserva.create', compact('listausuarios','listaestacionamientos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'estacionamiento'=>['required','exists:estacionamientos,estacionamiento_ID'],
            'vehiculo'=>['required','exists:vehiculos,vehiculo_ID']
        ]);        

        $estacionamientocapacidad=Estacionamiento::find($request->estacionamiento);
        $capacidad_actual=$estacionamientocapacidad->capacidad_actual;
        if ($capacidad_actual>0){
            try{
                DB::transaction(function () use ($request) {
            $reservanueva=Reserva::create([
                'estacionamiento_ID'=>$request->estacionamiento,
                'vehiculo_ID' =>$request->vehiculo,
                'fecha' => date('Y-m-d H:i:s'),
            ]);
            $estacionamientocapacidad=Estacionamiento::find($request->estacionamiento);
        $capacidad_actual=$estacionamientocapacidad->capacidad_actual;
            $estacionamientocapacidad->update([
                'capacidad_actual' => $capacidad_actual-1
            ]);
        });
        }catch(\Exception $e){
            return redirect()->route('Reserva.index')->with('success delete','Error no se puede registrar la reserva porque no hay capacidad actual en el estacionamiento');
        } 
            return redirect()->route('Reserva.index')->with('success','Nuevo Reserva Registrado Proceda a Efectuar el pago o Editar los datos');
        }else{
            return redirect()->route('Reserva.index')->with('success delete','Error no se puede registrar la reserva porque no hay capacidad actual en el estacionamiento');
        }



    }

    /**
     * 
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $reserva=Reserva::find($id);
        return view('AQParkingAdmin.Reserva.show',compact('reserva'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listausuarios = Usuario::where('rol', 'Usuario Natural')->get();
        $listaestacionamientos = Estacionamiento::all();
        $reservaeditar=Reserva::find($id);
        return view('AQParkingAdmin.Reserva.edit', compact('listausuarios','listaestacionamientos','reservaeditar'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'estacionamiento'=>['required','exists:estacionamientos,estacionamiento_ID'],
            'vehiculo'=>['required','exists:vehiculos,vehiculo_ID'],
//            'ingreso_vehiculo'=>['required','date','date_equals:'.date('Y-m-d H:i')],
            'ingreso_vehiculo'=>['required','date'],
            'estado'=>['required_if:estado,!=,Reserva Concluida','string',Rule::in(['Reservado', 'Reserva en Espera', 'Reserva Activa','Reserva Concluida'])]
        ]);

        //Logica para calcular el precio total de la reserva
        $ingreso_vehiculo=new DateTime($request->ingreso_vehiculo);
        $salida_vehiculo=null;
        $estacionamiento=Estacionamiento::find($request->estacionamiento);
        $precio_total=0;
        $horas_entre_fechas=0;
        if ($request->salida_vehiculo){
            $request->validate(['salida_vehiculo'=>['date','after_or_equal:ingreso_vehiculo']]);
            $salida_vehiculo=new DateTime($request->salida_vehiculo);
            $diferenciahoras=$salida_vehiculo->diff($ingreso_vehiculo);
            $horas_entre_fechas=$diferenciahoras->h;
            if ($diferenciahoras->i>=30){
                $horas_entre_fechas++;
            }
            $precio_total=(double)($estacionamiento->precio)*$horas_entre_fechas;
        }

        $reservaedit=Reserva::find($id);
        $reservaedit->update([
            'estacionamiento_ID'=>$request->estacionamiento,
            'vehiculo_ID' =>$request->vehiculo,
            'ingreso' => $request->ingreso_vehiculo,
            'salida' => $salida_vehiculo,
            'cantidad_horas' => $horas_entre_fechas,
            'precio_total' => $precio_total,
            'estado' => $request->estado?$request->estado:$reservaedit->estado
            ]);
        if ($request->estado=='Reserva Concluida'){
            $capacidad_actual=$estacionamiento->capacidad_actual;
            $estacionamiento->update([
                'capacidad_actual' => $capacidad_actual+1
            ]);
        }

        return redirect()->route('Reserva.index')->with('success','Los Datos de la Reserva se Editaron con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reservadelete=Reserva::find($id);
        $reservadelete->delete();
        return redirect()->route('Reserva.index')->with('success delete','Se Elimino correctamente la Reserva');
    }
}
