<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalksrelatedTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talksrelated', function (Blueprint $table) {
            $table->increments('id');
            $table->string('position')->nullable();
            $table->timestamps();
            $table->unsignedInteger('talks_id');
            $table->integer('related_talk_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talksrelated');
    }
}
