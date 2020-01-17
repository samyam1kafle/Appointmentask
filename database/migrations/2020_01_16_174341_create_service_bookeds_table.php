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
            $table->unsignedInteger('service_id');
            $table->unsignedInteger('available_date_id');
            $table->unsignedInteger('available_time_id');
            $table->unsignedInteger('provider_id');
            $table->unsignedInteger('receiver_id');
            $table->unsignedInteger('role_id');
            $table->date('booked_date');
            $table->time('booked_time');
            $table->enum('status',['booked'])->default('booked');
            $table->unsignedInteger('description_id');
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
