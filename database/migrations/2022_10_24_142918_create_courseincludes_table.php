<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseincludesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseincludes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->nullable()->default(0);
            $table->timestamps();
            $table->unsignedInteger('courses_id');
            $table->integer('included_course')->nullable();
            $table->string('included_course_title', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseincludes');
    }
}
