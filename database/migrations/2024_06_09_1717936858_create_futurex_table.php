<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuturexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('futurex', function (Blueprint $table) {
            $table->increments('id');
            $table->string("uid")->nullable();
			$table->string("cn")->nullable();
			$table->string("displayName")->nullable();
			$table->string("givenName")->nullable();
			$table->string("sn")->nullable();
			$table->string("mail")->nullable();
			$table->string("Nationalid")->nullable();
			
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
        Schema::dropIfExists('futurex');
    }
}
