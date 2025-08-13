<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizstudentanswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sectionquizstudentanswer', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean("is_correct")->nullable();
			$table->boolean("answered")->nullable();
			$table->integer("mark")->nullable();
			
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
        Schema::dropIfExists('sectionquizstudentanswer');
    }
}
