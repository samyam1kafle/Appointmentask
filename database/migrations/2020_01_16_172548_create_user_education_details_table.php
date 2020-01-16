<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserEducationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_education_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('inst_name');
            $table->string('inst_address');
            $table->string('degree_id');
            $table->string('faculty');
            $table->string('board');
            $table->date('passed_year');
            $table->string('passed_division');
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
        Schema::dropIfExists('user_education_details');
    }
}
