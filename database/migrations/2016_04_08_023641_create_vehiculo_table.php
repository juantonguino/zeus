<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('placa', 100)->nullable();
            $table->integer('numero')->nullable();
            $table->string('marca',100)->nullable();
            $table->string('linea',100)->nullable();
            $table->string('modelo',100)->nullable();
            $table->integer('capacidad')->nullable();
            $table->enum('tipo_vehiculo', ['Carro', 'Aeroban', 'Bus', 'Otro'])->default('Otro');

            $table->integer('empresa_transportes_id')->unsigned();
            $table->foreign('empresa_transportes_id')->references('id')->on('empresa_transportes')->onDelete('cascade');

            //$table->bigInteger('conductor_cedula')->unsigned();
            //$table->foreign('conductor_cedula')->references('cedula')->on('conductor')->onDelete('cascade');
            $table->bigInteger('conductor_id')->unsigned();
            $table->foreign('conductor_id')->references('id')->on('conductor')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('vehiculo');
    }
}
