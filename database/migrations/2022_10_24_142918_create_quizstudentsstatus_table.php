<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizstudentsstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quizstudentsstatus', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('start_time')->nullable()->comment('When the student started the quiz	');
            $table->integer('end_time')->nullable()->comment('When the student finished the quiz	');
            $table->text('pause_time')->nullable()->comment('The pause time,affected only when the quiz status is paused	');
            $table->boolean('status')->nullable()->default(false)->comment('0 = Not Started, 1 = In Progress, 2 = Paused, 3 = Skipped, 4 = Done');
            $table->integer('skipped_question_id')->nullable()->comment('When the student skipped the quiz	');
            $table->boolean('passed')->nullable()->default(false);
            $table->boolean('exam_anytime')->nullable()->default(false);
            $table->timestamps();
            $table->integer('quiz_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('certificate', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quizstudentsstatus');
    }
}
