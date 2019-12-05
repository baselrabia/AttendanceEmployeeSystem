<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSchedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedules', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('slug')->unique();
            $table->time('time_in');
            $table->time('time_out');

            $table->timestamps();
        });

        Schema::create('schedule_users', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('schedule_id')->unsigned();
            $table->primary(array('user_id', 'schedule_id'));

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('schedule_id')->references('id')->on('schedules')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign(array('user_id', 'schedule_id'));

        Schema::dropIfExists('schedule_users');
        Schema::dropIfExists('schedules');
    }
}
