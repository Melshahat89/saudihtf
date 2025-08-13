<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->string("title")->nullable();
            $table->string("country_code")->nullable();
            $table->string("company_name")->nullable();
            $table->string("company_size")->nullable();
            $table->string("website_url")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIfExists('title');
            $table->dropIfExists('country_code');
            $table->dropIfExists('company_name');
            $table->dropIfExists('company_size');
            $table->dropIfExists('website_url');
        });
    }
}
