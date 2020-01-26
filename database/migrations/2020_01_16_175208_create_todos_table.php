<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTodosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('todos', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('User_id');
            $table->string('title');
            $table->longText('description');
            $table->date('assignedDate');
            $table->date('CompletedDate')->nullable();
            $table->string('assignedTo');
            $table->string('requestedBy');
            $table->string('reassignedto')->nullable();
            $table->date('DeadLine');
            $table->boolean('status')->default(0);
            $table->longText('remarks')->nullable();
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
        Schema::dropIfExists('todos');
    }
}
