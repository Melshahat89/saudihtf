<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalksreviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talksreviews', function (Blueprint $table) {
            $table->increments('id');
            $table->string('review')->nullable();
            $table->integer('rating')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('talks_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talksreviews');
    }
}
