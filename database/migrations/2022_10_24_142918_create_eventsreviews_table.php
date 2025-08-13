<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventsreviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('events_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventsreviews');
    }
}
