<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturequestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecturequestions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('question_title')->nullable();
            $table->text('question_description')->nullable();
            $table->boolean('approve')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('courselectures_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecturequestions');
    }
}
