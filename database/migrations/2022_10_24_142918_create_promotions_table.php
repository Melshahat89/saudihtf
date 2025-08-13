<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePromotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('promotions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->text('description')->nullable();
            $table->integer('type')->nullable();
            $table->string('value_for_egp')->nullable();
            $table->string('value_for_other_currencies')->nullable();
            $table->string('code')->nullable();
            $table->dateTime('start_date')->nullable();
            $table->dateTime('expiration_date')->nullable();
            $table->boolean('active')->nullable();
            $table->string('promotion_limit')->nullable();
            $table->string('promotion_usage')->nullable();
            $table->boolean('publish_as_notification')->nullable();
            $table->text('notification_message')->nullable();
            $table->boolean('include_courses')->nullable();
            $table->timestamps();
            $table->integer('affiliate')->nullable();
            $table->integer('affiliate_perc')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('promotions');
    }
}
