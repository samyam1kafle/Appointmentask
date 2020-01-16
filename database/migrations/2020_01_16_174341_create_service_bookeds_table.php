<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceBookedsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_bookeds', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('booking_id');
            $table->foreign('booking_id')->references('id')->on('bookings')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('service_id');
            $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('available_date_id');
            $table->foreign('available_date_id')->references('id')->on('available_dates')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('available_time_id');
            $table->foreign('available_time_id')->references('id')->on('available_times')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('provider_id');
            $table->foreign('provider_id')->references('id')->on('all_users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('receiver_id');
            $table->foreign('receiver_id')->references('id')->on('all_users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade')->onUpdate('cascade');
            $table->date('booked_date');
            $table->time('booked_time');
            $table->enum('status',['booked'])->default('booked');
            $table->unsignedInteger('description_id');
            $table->foreign('description_id')->references('id')->on('services')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('service_bookeds');
    }
}
