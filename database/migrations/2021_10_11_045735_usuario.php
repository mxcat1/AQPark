<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Usuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('usuario_ID');
            $table->unsignedBigInteger('tipo_docu_ID')->nullable();
            $table->string('documento',50);
            $table->string('nombre',150);
            $table->string('apellido',150);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('telefono',12)->nullable();
            $table->string('password');
            $table->string('foto')->default('foto-perfil.jpg')->nullable();
            $table->enum('rol',['Administrador Estacionamiento','Usuario Natural','Administrador Sistema'])->default('Usuario Natural');
            $table->rememberToken();
            $table->timestamps();

            $table->foreign('tipo_docu_ID')->references('tipo_docu_ID')->on('tipo_documentos')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
