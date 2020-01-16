<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceCancelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_cancels', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('status',['cancel'])->default('cancel');
            $table->unsignedInteger('Booked_id');
            $table->foreign('Booked_id')->references('id')->on('service_bookeds')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('service_cancels');
    }
}
