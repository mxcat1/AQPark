<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estacionamiento extends Model
{
    use HasFactory;

    protected $table = 'estacionamientos';
    protected $primaryKey = 'estacionamiento_ID';
    protected $perPage = 10;

    protected $fillable = [
        'usuario_ID',
        'nombre',
        'telefono',
        'direccion',
        'referencia',
        'distrito',
        'capacidad',
        'capacidad_actual',
        'apertura',
        'cierre',
        'precio',
        'foto',
        'estado',
        'longitud',
        'latitud'
    ];

    /*
     * Relaciones
     */

    public function Usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_ID', 'usuario_ID');
    }

    public function Reserva()
    {
        return $this->hasMany(Reserva::class, 'reserva_ID', 'reserva_ID');
    }
}
