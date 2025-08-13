<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotionusers', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('used')->nullable()->default(false);
            $table->timestamps();
            $table->integer('promotions_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('orders_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotionusers');
    }
}
