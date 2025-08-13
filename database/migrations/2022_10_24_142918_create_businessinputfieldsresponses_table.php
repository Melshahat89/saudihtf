<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessinputfieldsresponsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessinputfieldsresponses', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('businessinputfields_id');
            $table->integer('user_id');
            $table->mediumText('answer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessinputfieldsresponses');
    }
}
