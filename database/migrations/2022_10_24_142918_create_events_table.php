<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->longText('description')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_free')->nullable();
            $table->string('price_egp')->nullable();
            $table->string('price_usd')->nullable();
            $table->integer('type')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->text('location')->nullable();
            $table->text('live_link')->nullable();
            $table->text('recorded_link')->nullable();
            $table->timestamps();
            $table->unsignedInteger('categories_id');
            $table->unsignedInteger('eventsdata_id');
            $table->integer('visits')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('end_date')->nullable();
            $table->integer('instructor_per')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
