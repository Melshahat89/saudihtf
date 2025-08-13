<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsenrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventsenrollment', function (Blueprint $table) {
            $table->increments('id');
            $table->date('start_time')->nullable();
            $table->date('end_time')->nullable();
            $table->boolean('status')->nullable();
            $table->timestamps();
            $table->unsignedInteger('events_id');
            $table->unsignedInteger('user_id');
            $table->string('certificate', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventsenrollment');
    }
}
