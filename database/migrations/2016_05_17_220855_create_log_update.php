<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogUpdate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_update', function (Blueprint $table) {
            $table->increments('id');
            $table->string('old_values', 500);
            $table->string('new_values', 500);
            $table->string('type');
            $table->string('user_name');
            $table->timestamp('insert_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('log_update');
    }
}
