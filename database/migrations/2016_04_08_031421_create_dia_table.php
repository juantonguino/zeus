<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dia', function (Blueprint $table) {
            $table->increments('id');
            $table->text('destino')->nullable();
            $table->text('instrucciones_recorrido_guia')->nullable();
            $table->text('recorrido_plan')->nullable();
            $table->date('fecha')->nullable();
            $table->decimal('total_gastado', 11, 2)->nullable();
            $table->decimal('dinero_asignado', 11, 2)->nullable();

            $table->integer('grupo_id')->unsigned();
            $table->foreign('grupo_id')->references('id')->on('grupo')->onDelete('cascade');

            $table->integer('hotel_id')->unsigned();
            $table->foreign('hotel_id')->references('id')->on('hotel')->onDelete('cascade');

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
        Schema::drop('dia');
    }
}
