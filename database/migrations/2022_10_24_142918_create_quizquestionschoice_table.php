<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizquestionschoiceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizquestionschoice', function (Blueprint $table) {
            $table->increments('id');
            $table->string('choice')->nullable();
            $table->boolean('is_correct')->nullable()->default(false);
            $table->timestamps();
            $table->unsignedInteger('quizquestions_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizquestionschoice');
    }
}
