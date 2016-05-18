<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLogDelete extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_delete', function (Blueprint $table) {
          $table->increments('id');
          $table->string('user_email');
          $table->string('delete_values');
          $table->string('type');
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
        Schema::drop('log_delete');
    }
}
