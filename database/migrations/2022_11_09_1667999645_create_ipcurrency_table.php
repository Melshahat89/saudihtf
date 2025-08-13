<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpcurrencyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ipcurrency', function (Blueprint $table) {
            $table->increments('id');
            $table->string("ip")->nullable();
			$table->string("type")->nullable();
			$table->string("continent")->nullable();
			$table->string("continent_code")->nullable();
			$table->string("country")->nullable();
			$table->string("country_code")->nullable();
			$table->string("country_flag")->nullable();
			$table->string("region")->nullable();
			$table->string("city")->nullable();
			$table->string("timezone")->nullable();
			$table->string("currency")->nullable();
			$table->string("currency_code")->nullable();
			$table->string("currency_rates")->nullable();
			
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
        Schema::dropIfExists('ipcurrency');
    }
}
