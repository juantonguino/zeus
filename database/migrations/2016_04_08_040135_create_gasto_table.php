<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGastoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gasto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('concepto', 100)->nullable();
            $table->integer('cantidad')->nullable();
            $table->decimal('valor_unitario', 11,2)->nullable();
            $table->decimal('valor_total', 11,2)->nullable();
            $table->enum('tipo_gasto', ['Comedor', 'Transporte', 'Refrigerio', 'Otro'])->default('Otro');

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
        Schema::drop('gasto');
    }
}
