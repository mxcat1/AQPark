<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Reserva extends Model
{
    use HasFactory;

    protected $table = 'reservas';
    protected $primaryKey = 'reserva_ID';

    protected $fillable = [
        'estacionamiento_ID',
        'vehiculo_ID',
        'fecha',
        'estado',
        'ingreso',
        'salida',
        'cantidad_horas',
        'precio_total'
    ];
    protected $perPage = 10;

    /*
     * Relaciones
     */

    public function Vehiculo()
    {
        return $this->belongsTo(Vehiculo::class, 'vehiculo_ID', 'vehiculo_ID');
    }

    public function Estacionamiento()
    {
        return $this->belongsTo(Estacionamiento::class, 'estacionamiento_ID', 'estacionamiento_ID');
    }
    /*
     * Scopes para Filtrar
     */

    public function scopeAnio($query, $year){
        if ($year) {
            $query->whereYear('fecha',$year);
        }
    }
    public function scopeMes($query, $mes){
        if ($mes) {
            $query->whereMonth('fecha',$mes);
        }
    }
    public function scopeBuscarParking($query, $estacionamiento){
        if ($estacionamiento) {
            $query->where('estacionamiento_ID',$estacionamiento);
        }
    }
    public function scopeReservasUsuario($query){
        if (Auth::check()) {
            $carros=[];
            foreach (Auth::user()->Vehiculos as $vehiculo){
                $carros[]=$vehiculo->vehiculo_ID;
            }
            $query->whereIn('vehiculo_ID',$carros);
        }
    }
}
