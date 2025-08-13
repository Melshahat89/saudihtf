<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseenrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseenrollment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->boolean('status')->nullable()->default(true);
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('courses_id');
            $table->string('certificate', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseenrollment');
    }
}
