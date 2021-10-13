<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Estacionamiento extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('estacionamientos',function (Blueprint $table){
            $table->id('estacionamiento_ID');
            $table->unsignedBigInteger('usuario_ID');
            $table->string('nombre')->nullable();
            $table->string('telefono',12);
            $table->string('direccion');
            $table->string('referencia')->nullable();
            $table->string('distrito');
            $table->integer('capacidad');
            $table->integer('capacidad_actual');
            $table->time('apertura');
            $table->time('cierre');
            $table->float('precio',16,4);
            $table->string('foto');
            $table->float('longitud',16,7);
            $table->float('latitud',16,7);
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
        Schema::dropIfExists('estacionamientos');
    }
}
