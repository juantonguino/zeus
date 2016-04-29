<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHotelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotel', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre',100);
            $table->bigInteger('telefono');
            $table->string('administrador',100)->nullable();
            $table->integer('capacidad')->nullable();
            $table->string('direccion',100)->nullable();
            $table->string('correo_electronico',100)->nullable();
            $table->string('pagina_web',100)->nullable();

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
        Schema::drop('hotel');
    }
}
