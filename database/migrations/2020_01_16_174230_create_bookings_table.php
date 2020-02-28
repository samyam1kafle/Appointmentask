<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->default(null);
            $table->unsignedInteger('User_id');
            $table->unsignedInteger('service_id');
            $table->enum('Appointmentstatus',['pending','unapprove','approve'])->default('pending');
            $table->enum('Servicestatus',['pending','completed','reschedule','cancel'])->default('pending');
            $table->date('booking_date');
            $table->time('booking_time');
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
        Schema::dropIfExists('bookings');
    }
}
