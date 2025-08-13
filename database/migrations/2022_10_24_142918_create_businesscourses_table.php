<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinesscoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businesscourses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
            $table->unsignedInteger('businessdata_id');
            $table->unsignedInteger('courses_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businesscourses');
    }
}
