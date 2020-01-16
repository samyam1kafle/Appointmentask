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
            $table->foreign('User_id')->references('id')->on('all_users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('booked_id')->nullable();
            $table->foreign('booked_id')->references('id')->on('service_bookeds')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('cancel_id')->nullable();
            $table->foreign('cancel_id')->references('id')->on('service_cancels')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('reschedule_id')->nullable();
            $table->foreign('reschedule_id')->references('id')->on('service_reschedules')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('complete_id')->nullable();
            $table->foreign('complete_id')->references('id')->on('service_completes')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('booking_id')->nullable();
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
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
