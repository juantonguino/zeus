<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipo_documento', ['Cédula de Ciudadania', 'Tarjeta de Identidad', 'Cedula Extrangera', 'Pasaporte', 'Otro'])->default('Otro');
            $table->bigInteger('numero_documento');
            $table->string('nombres', 100);
            $table->bigInteger('telefono')->nullable();
            $table->string('direccion', 150)->nullable();
            $table->string('correo_electronico', 150)->nullable();
            $table->date('fecha_nacimiento');

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupo')->onDelete('cascade');

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
        Schema::drop('cliente');
    }
}
