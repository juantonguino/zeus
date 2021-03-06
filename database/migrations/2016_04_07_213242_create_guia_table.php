<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('cedula');
            $table->string('nombres',100);
            $table->bigInteger('telefono');
            $table->date('fecha_nacimiento')->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('perfil_academico',100)->nullable();

            $table->string('email')->unique();
            $table->string('password')->nullable();

            $table->rememberToken();
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
        Schema::drop('guia');
    }
}
