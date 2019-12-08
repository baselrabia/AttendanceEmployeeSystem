<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttendancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attendances', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('user_id')->unsigned();

            $table->time('attendance_time')->default(date("H:i"));
            $table->date('attendance_date');
            $table->boolean('status')->default(1);


            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropForeign(array('user_id', 'schedule_id'));

        Schema::dropIfExists('attendances');
    }
}
