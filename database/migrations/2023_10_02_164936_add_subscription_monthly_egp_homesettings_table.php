<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubscriptionMonthlyEgpHomesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homesettings', function (Blueprint $table) {
            $table->string('subscription_monthly_egp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('homesettings', function (Blueprint $table) {
            $table->dropIfExists('subscription_monthly_egp');
        });
    }
}
