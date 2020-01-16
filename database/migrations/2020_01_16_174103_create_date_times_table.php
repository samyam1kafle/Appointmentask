<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDateTimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_times', function (Blueprint $table) {
            $table->increments('id');$table->unsignedInteger('Date_id');
            $table->foreign('Date_id')->references('id')->on('available_dates')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('Time_id');
            $table->foreign('Time_id')->references('id')->on('available_times')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('date_times');
    }
}
