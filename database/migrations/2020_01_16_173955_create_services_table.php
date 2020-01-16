<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('User_id');
            $table->foreign('User_id')->references('id')->on('all_users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedInteger('Department_id');
            $table->foreign('Department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->longText('Service_description');
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
        Schema::dropIfExists('services');
    }
}
