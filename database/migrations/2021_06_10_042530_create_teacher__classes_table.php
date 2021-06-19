<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher__classes', function (Blueprint $table) {
            $table->integer('teacherID');
            $table->integer('classID');
            $table->foreign('teacherID')->references('userID')->on('users');
            $table->foreign('classID')->references('classID')->on('classes');
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
        Schema::dropIfExists('teacher__classes');
    }
}
