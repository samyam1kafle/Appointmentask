<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAvailableTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('available_times', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('date_id');
            $table->foreign('date_id')->references('id')->on('available_dates')->onDelete('cascade')->onUpdate('cascade');
            $table->time('time');
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('id')->on('all_users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('Service_id');
            $table->foreign('Service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('available_times');
    }
}
