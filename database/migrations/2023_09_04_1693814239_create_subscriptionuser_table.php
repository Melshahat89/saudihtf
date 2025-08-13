<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubscriptionuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptionuser', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("subscription_id")->nullable();
			$table->date("start_date")->nullable();
			$table->date("end_date")->nullable();
			$table->double("amount")->nullable();
			$table->integer("b_type")->nullable();
			$table->boolean("is_active")->nullable();
			$table->boolean("is_collected")->nullable();
			
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
        Schema::dropIfExists('subscriptionuser');
    }
}
