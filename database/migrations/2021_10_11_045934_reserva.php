<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Reserva extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('reservas',function (Blueprint $table) {
            $table->id('reserva_ID');
            $table->unsignedBigInteger('estacionamiento_ID');
            $table->unsignedBigInteger('vehiculo_ID')->nullable();
            $table->dateTime('fecha');
            $table->enum('estado',['Reservado','Reserva en Espera','Reserva Activa','Reserva Concluida'])->default('Reservado');
            $table->datetime('ingreso')->nullable();;
            $table->datetime('salida')->nullable();;
            $table->integer('cantidad_horas')->default(0)->nullable();
            $table->float('precio_total',16,4)->default(0)->nullable();
            $table->timestamps();

            $table->foreign('estacionamiento_ID')->references('estacionamiento_ID')->on('estacionamientos')->onDelete('cascade');
            $table->foreign('vehiculo_ID')->references('vehiculo_ID')->on('vehiculos')->nullOnDelete();

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
        Schema::dropIfExists('reservas');
    }
}
