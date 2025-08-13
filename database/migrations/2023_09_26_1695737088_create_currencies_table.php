<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string("currency_code")->nullable();
			$table->string("country_id")->nullable();
			$table->integer("discount_perc")->nullable();
			$table->double("exchangeratetoegp")->nullable();
			$table->double("exchangeratetousd")->nullable();
			$table->double("exchangeratetoaed")->nullable();
			$table->double("b2c_monthly_discount_perc")->nullable();
			$table->double("b2c_yearly_discount_perc")->nullable();
			
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
        Schema::dropIfExists('currencies');
    }
}
