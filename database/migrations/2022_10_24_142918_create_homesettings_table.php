<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHomesettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('homesettings', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('bundles')->nullable()->default(false);
            $table->integer('bundle_discount')->nullable();
            $table->boolean('courses')->nullable()->default(false);
            $table->integer('courses_discount')->nullable();
            $table->boolean('events')->nullable()->default(false);
            $table->boolean('talks')->nullable()->default(false);
            $table->tinyInteger('masters')->nullable()->default(0);
            $table->integer('masters_discount')->nullable();
            $table->integer('diplomas')->nullable();
            $table->integer('diplomas_discount')->nullable();
            $table->timestamps();
            $table->string('seo_title', 255)->nullable();
            $table->string('seo_desc', 255)->nullable();
            $table->string('seo_keys', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('homesettings');
    }
}
