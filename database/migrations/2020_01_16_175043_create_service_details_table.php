<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('User_id');
            $table->unsignedInteger('booked_id')->nullable();
            $table->unsignedInteger('cancel_id')->nullable();
            $table->unsignedInteger('reschedule_id')->nullable();
            $table->unsignedInteger('complete_id')->nullable();
            $table->unsignedInteger('booking_id')->nullable();
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
        Schema::dropIfExists('service_details');
    }
}
