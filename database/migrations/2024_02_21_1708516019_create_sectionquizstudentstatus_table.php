<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizstudentstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectionquizstudentstatus', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean("passed")->nullable();
			$table->integer("status")->nullable();
			$table->date("start_time")->nullable();
			$table->date("end_time")->nullable();
			
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sectionquizstudentstatus');
    }
}
