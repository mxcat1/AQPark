<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocumento extends Model
{
    use HasFactory;

    protected $table = 'tipo_documentos';
    protected $primaryKey = 'tipo_docu_ID';

    protected $fillable = ['descripcion'];

    /*
     * Relaciones
     */

    public function Usuarios()
    {
        return $this->hasMany(Usuario::class);
    }
}
