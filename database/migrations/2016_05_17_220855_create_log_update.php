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
            $table->string('old_values');
            $table->string('new_values');
            $table->string('type');
            $table->string('user_email');
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
