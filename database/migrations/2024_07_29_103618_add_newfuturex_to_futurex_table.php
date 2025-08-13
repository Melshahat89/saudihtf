<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewfuturexToFuturexTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('futurex', function (Blueprint $table) {
            $table->string("eppn")->nullable();
            $table->string("email")->nullable();
            $table->string("arabicFullName")->nullable();
            $table->string("englishFullName")->nullable();
            $table->string("arabicFirstName")->nullable();
            $table->string("arabicLastName")->nullable();
            $table->string("englishFirstName")->nullable();
            $table->string("englishLastName")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('futurex', function (Blueprint $table) {
            $table->dropIfExists('eppn');
            $table->dropIfExists('email');
            $table->dropIfExists('arabicFullName');
            $table->dropIfExists('englishFullName');
            $table->dropIfExists('arabicFirstName');
            $table->dropIfExists('arabicLastName');
            $table->dropIfExists('englishFirstName');
            $table->dropIfExists('englishLastName');
        });
    }
}
