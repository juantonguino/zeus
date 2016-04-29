<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarifaRestauranteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarifa_restaurante', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto',100);
            $table->decimal('valor',11,2);

            $table->integer('restaurante_id')->unsigned()->nullable();
            $table->foreign('restaurante_id')->references('id')->on('restaurante')->onDelete('cascade');
            
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
        Schema::drop('tarifa_restaurante');
    }
}
