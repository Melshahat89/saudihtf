<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddB2bToHomesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('homesettings', function (Blueprint $table) {
            $table->string('b2b_monthly')->nullable();
            $table->string('b2b_annual')->nullable();

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
            $table->dropIfExists('b2b_monthly');
            $table->dropIfExists('b2b_annual');
        });
    }
}
