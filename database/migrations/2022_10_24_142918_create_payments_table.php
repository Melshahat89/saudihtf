<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('operation')->nullable();
            $table->double('amount')->nullable();
            $table->integer('currency_id')->nullable();
            $table->string('receiver_id')->nullable();
            $table->string('token')->nullable();
            $table->string('token_date')->nullable();
            $table->string('status', 50)->nullable();
            $table->string('accept_source_data_type')->nullable();
            $table->string('accept_id')->nullable();
            $table->string('accept_pending')->nullable();
            $table->string('accept_order')->nullable();
            $table->string('accept_amount_cents')->nullable();
            $table->string('accept_success')->nullable();
            $table->string('accept_data_message')->nullable();
            $table->string('accept_profile_id')->nullable();
            $table->string('accept_source_data_sub_type')->nullable();
            $table->string('accept_hmac')->nullable();
            $table->string('txn_response_code')->nullable();
            $table->timestamps();
            $table->integer('user_id')->nullable();
            $table->integer('orders_id')->nullable();
            $table->decimal('profit_percentage', 5)->nullable();
            $table->decimal('profit', 10)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payments');
    }
}
