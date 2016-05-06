<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateConductorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conductor', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cedula');
            $table->string('nombres',100);
            $table->bigInteger('telefono');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('correo_electronico',100)->nullable();
            $table->string('perfil_academico', 100)->nullable();

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
        Schema::drop('conductor');
    }
}
