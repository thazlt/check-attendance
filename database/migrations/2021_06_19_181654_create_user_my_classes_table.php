<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserMyClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_my_class', function (Blueprint $table) {
            $table->integer('teacherID');
            $table->integer('classID');
            $table->primary(['teacherID', 'classID']);
            $table->timestamps();
            $table->foreign('teacherID')->references('userID')->on('users');
            $table->foreign('classID')->references('classID')->on('classes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_my_class');
    }
}
