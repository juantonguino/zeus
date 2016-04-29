<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGrupoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nombre', 100);
            $table->boolean('estado')->default(true);
            $table->string('ciudad_origen', 100)->nullable();
            $table->dateTime('fecha_llegada')->nullable();
            $table->text('descripcion_transporte_llegada')->nullable();
            $table->dateTime('fecha_salida')->nullable();
            $table->text('descripcion_transporte_salida')->nullable();
            $table->decimal('costo_total_recorrido', 11, 2)->nullable();
            $table->decimal('costo_total_gastado', 11, 2)->nullable();

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
        Schema::drop('grupo');
    }
}
