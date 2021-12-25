<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
