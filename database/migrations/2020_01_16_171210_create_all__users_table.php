<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('all__users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->tinyInteger('role_id')->nullable();
            $table->boolean('status')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->enum('gender',['Male','Female','Other'])->nullable();
            $table->integer('service_id')->nullable();
            $table->integer('department_id')->nullable();
            $table->date('available_date')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('all__users');
    }
}
