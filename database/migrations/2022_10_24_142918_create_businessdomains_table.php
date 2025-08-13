<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessdomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessdomains', function (Blueprint $table) {
            $table->increments('id');
            $table->string('domainname')->nullable();
            $table->boolean('status')->nullable()->default(false);
            $table->timestamps();
            $table->unsignedInteger('businessdata_id');
            $table->string('token', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('businessdomains');
    }
}
