<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuiaDiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guia_dia', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('cancelado')->default(false);
            $table->decimal('valor',11,2)->nullable();

            //$table->bigInteger('guia_cedula')->unsigned();
            //$table->foreign('guia_cedula')->references('cedula')->on('guia')->onDelete('cascade');
            $table->integer('guia_id')->unsigned();
            $table->foreign('guia_id')->references('id')->on('guia')->onDelete('cascade');

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
        Schema::drop('guia_dia');
    }
}
