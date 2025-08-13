<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursereviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursereviews', function (Blueprint $table) {
            $table->increments('id');
            $table->text('review')->nullable();
            $table->integer('rating')->nullable();
            $table->boolean('type')->nullable()->default(false);
            $table->string('manual_name')->nullable();
            $table->string('manual_image')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id');
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
        Schema::dropIfExists('coursereviews');
    }
}
