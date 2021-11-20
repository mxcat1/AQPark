<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    use HasFactory;

    protected $table = 'vehiculos';
    protected $primaryKey = 'vehiculo_ID';

    protected $fillable = ['usuario_ID', 'marca', 'modelo', 'color', 'placa'];

    protected $perPage = 12;

    /*
     * Relaciones
     */
    public function Usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_ID', 'usuario_ID');
    }

    public function Reserva()
    {
        return $this->hasMany(Reserva::class);
    }
}
