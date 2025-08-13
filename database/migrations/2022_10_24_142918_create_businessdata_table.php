<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessdata', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->integer('discount_type')->nullable()->comment('1= Percentage ,2 = Value ');
            $table->string('discount_value')->nullable();
            $table->integer('discount_value_dollar')->nullable();
            $table->boolean('automatically_license')->nullable();
            $table->string('logo')->nullable();
            $table->integer('status')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->integer('licenses')->nullable();
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->string('banner', 200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessdata');
    }
}
