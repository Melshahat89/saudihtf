<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursesections', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('will_do_at_the_end')->nullable();
            $table->integer('position')->nullable()->default(0);
            $table->timestamps();
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
        Schema::dropIfExists('coursesections');
    }
}
