<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesnotesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesnotes', function (Blueprint $table) {
            //
            $table->id();
            $table->text('note');
            $table->integer('seconds')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('lecture_id');
            $table->foreignId('courses_id');
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
        Schema::dropIfExists('coursesnotes');
    }
}
