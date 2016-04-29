<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVehiculoDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehiculo_dia', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('cancelado')->default(false);
            $table->decimal('valor',11,2)->nullable();

            $table->integer('vehiculo_id')->unsigned();
            $table->foreign('vehiculo_id')->references('id')->on('vehiculo')->onDelete('cascade');

            $table->integer('dia_id')->unsigned();
            $table->foreign('dia_id')->references('id')->on('dia')->onDelete('cascade');

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
        Schema::drop('vehiculo_dia');
    }
}
