<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('status')->nullable();
            $table->string('comments')->nullable()->comment('Order Status, 0 = Cancelled, 1 = Pending, 2 = Done	');
            $table->string('billing_address_id')->nullable();
            $table->string('accept_order_id')->nullable();
            $table->string('kiosk_id')->nullable();
            $table->string('fawryRefNumber', 250)->nullable();
            $table->string('paypalorderid', 255)->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->integer('payments_id')->nullable();
            $table->integer('accept_status')->nullable()->default(0);
            $table->integer('emp_id')->nullable();
            $table->integer('type')->default(1);
            $table->string('aff_id', 255)->nullable();
            $table->string('aff_channel', 255)->nullable();
            $table->tinyInteger('is_free')->nullable()->default(0);
            $table->string('exchange_rate')->nullable();
            $table->string('currency')->nullable();
            $table->foreignId('consultation_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
