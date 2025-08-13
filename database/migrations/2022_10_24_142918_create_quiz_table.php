<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quiz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('description')->nullable();
            $table->string('instructions')->nullable();
            $table->string('time')->nullable()->default('1440');
            $table->string('time_in_mins')->nullable()->default('0');
            $table->string('type')->nullable()->default('1');
            $table->string('pass_percentage')->nullable()->default('60');
            $table->timestamps();
            $table->integer('courses_id')->nullable();
            $table->integer('coursesections_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quiz');
    }
}
