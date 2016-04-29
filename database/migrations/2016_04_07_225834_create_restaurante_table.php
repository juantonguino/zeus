<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRestauranteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->integer('capacidad')->nullable();
            $table->bigInteger('telefono');
            $table->string('direccion',100)->nullable();
            $table->string('administrador',100)->nullable();
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
        Schema::drop('restaurante');
    }
}
