<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserWorkDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_work_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('profession');
            $table->string('work_exp');
            $table->string('org_name');
            $table->string('org_address');
            $table->string('phone_1');
            $table->string('phone_2')->nullable();
            $table->string('org_pan');
            $table->string('document');
            $table->double('fee');
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
        Schema::dropIfExists('user_work_details');
    }
}
