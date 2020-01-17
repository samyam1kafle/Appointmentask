<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceReschedulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_reschedules', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status', ['reschedule'])->default('reschedule');
            $table->date('Reschedule_date');
            $table->time('Reschedule_time');
            $table->unsignedInteger('Available_date_id');
            $table->unsignedInteger('Available_time_id');
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
        Schema::dropIfExists('service_reschedules');
    }
}
