<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizstudentsanswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizstudentsanswers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('is_correct')->nullable()->default(false);
            $table->boolean('answered')->nullable()->default(true)->comment('0 = Skipped, 1 = Answered	');
            $table->integer('mark')->nullable()->default(0);
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('quizquestionschoice_id');
            $table->unsignedInteger('quizquestions_id');
            $table->unsignedInteger('quiz_id');
            $table->unsignedInteger('quizstudentsstatus_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizstudentsanswers');
    }
}
