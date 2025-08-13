<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessgroupsusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessgroupsusers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('status')->nullable();
            $table->string('note')->nullable();
            $table->timestamps();
            $table->unsignedInteger('businessgroups_id');
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
        Schema::dropIfExists('businessgroupsusers');
    }
}
