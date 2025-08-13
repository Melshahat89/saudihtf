<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalklikesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('talklikes', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->unsignedInteger('talks_id');
            $table->unsignedInteger('user_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('talklikes');
    }
}
