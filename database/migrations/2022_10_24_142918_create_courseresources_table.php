<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourseresourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courseresources', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title')->nullable();
            $table->string('file')->nullable();
            $table->timestamps();
            $table->unsignedInteger('courses_id');
            $table->integer('position')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courseresources');
    }
}
