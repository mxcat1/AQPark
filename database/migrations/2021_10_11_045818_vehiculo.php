<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Vehiculo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('vehiculos',function(Blueprint $table){
            $table->id('vehiculo_ID');
            $table->unsignedBigInteger('usuario_ID');
            $table->string('marca',150);
            $table->string('modelo',150);
            $table->string('color',100);
            $table->string('placa',10)->unique();
            $table->timestamps();

            $table->foreign('usuario_ID')->references('usuario_ID')->on('usuarios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('vehiculos');
    }
}
