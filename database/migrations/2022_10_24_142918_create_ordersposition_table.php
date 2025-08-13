<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderspositionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordersposition', function (Blueprint $table) {
            $table->increments('id');
            $table->double('amount')->nullable();
            $table->string('notes')->nullable();
            $table->integer('certificate_id')->nullable();
            $table->string('shipping_id')->nullable();
            $table->integer('status')->nullable()->comment('Service Order Status (Review), 0 = Peniding, 1 = Accepted, 2 = Cancelled	');
            $table->timestamps();
            $table->unsignedInteger('orders_id')->nullable();
            $table->unsignedInteger('courses_id')->nullable();
            $table->unsignedInteger('user_id')->nullable();
            $table->integer('quantity')->nullable();
            $table->integer('unit_price')->nullable();
            $table->tinyInteger('done')->nullable();
            $table->integer('type')->default(1)->comment('course = 1 , Event=2');
            $table->unsignedInteger('events_id')->nullable();
            $table->string('currency', 50)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ordersposition');
    }
}
