<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConsultationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('consultations', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->text('slug');
            $table->text('description')->nullable();
            $table->integer('price');
            $table->integer('price_usd');
            $table->integer('discount_egp')->nullable();
            $table->integer('discount_usd')->nullable();
            $table->text('image')->nullable();
            $table->foreignId('cons_categories_id');
            $table->foreignId('consultant_id');
            $table->integer('consultant_perc');
            $table->boolean('published')->nullable()->default(0);
            $table->integer('visits')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('consultations');
    }
}
