<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceCompletesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_completes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('service_booked_id')->nullable();
            $table->unsignedInteger('service_reschedule_id')->nullable();
            $table->enum('status',['complete'])->default('complete');
            $table->date('complete_date');
            $table->time('complete_time');
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
        Schema::dropIfExists('service_completes');
    }
}
