<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessuserspendingemailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessuserspendingemails', function (Blueprint $table) {
            $table->integer('id', true);
            $table->integer('businessdata_id');
            $table->string('email', 255);
            $table->timestamps();
            $table->softDeletes();
            $table->integer('group_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessuserspendingemails');
    }
}
