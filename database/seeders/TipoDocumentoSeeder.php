<?php

namespace Database\Seeders;

use App\Models\TipoDocumento;
use Illuminate\Database\Seeder;

class TipoDocumentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TipoDocumento::create([
            'descripcion' => 'Documento Nacional de Identidad',
            'abreviacion' => 'DNI',
        ]);
        TipoDocumento::create([
            'descripcion' => 'Registro Único de Contribuyentes',
            'abreviacion' => 'RUC',
        ]);
        TipoDocumento::create([
            'descripcion' => 'Carné de Extranjería',
            'abreviacion' => 'CE',
        ]);
    }
}
