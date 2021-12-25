<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

//class Usuario extends Authenticatable implements MustVerifyEmail
class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_ID';


    protected $perPage = 10;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'nombre',
        'apellido',
        'tipo_docu_ID',
        'documento',
        'telefono',
        'email',
        'password',
        'foto',
        'rol'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Relaciones
     */
    public function TipoDocumento()
    {
        return $this->belongsTo(TipoDocumento::class, 'tipo_docu_ID', 'tipo_docu_ID');
    }

    public function Vehiculos()
    {
        return $this->hasMany(Vehiculo::class,'usuario_ID','usuario_ID');
    }

    public function Estacionamientos()
    {
        return $this->hasMany(Estacionamiento::class,'usuario_ID','usuario_ID');
    }
}
