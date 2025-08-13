<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourselecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courselectures', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('video_file')->nullable();
            $table->string('length')->nullable();
            $table->boolean('is_free')->nullable()->default(false);
            $table->integer('position')->nullable()->default(0);
            $table->timestamps();
            $table->unsignedInteger('courses_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->unsignedInteger('coursesections_id')->nullable();
            $table->string('vid_playbackInfo', 200)->nullable();
            $table->string('vdocipher_id', 200)->nullable();
            $table->dateTime('start_date')->nullable();
            $table->string('webinar_link', 250)->nullable();
            $table->integer('event_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courselectures');
    }
}
