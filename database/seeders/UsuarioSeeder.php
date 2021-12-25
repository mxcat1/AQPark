<?php

namespace Database\Seeders;

use App\Models\Usuario;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Usuario::create([
            'nombre' => 'Administrador',
            'apellido' => 'Administrador',
            'email' => 'admin@gmail.com',
            'telefono' => '958305428',
            'tipo_docu_ID' => 1,
            'documento' => '12345678',
            'foto' => 'foto-perfil.jpg',
            'rol' => 'Administrador Sistema',
            'password' => Hash::make('admin123456789'),
        ]);
    }
}
