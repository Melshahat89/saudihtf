<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('slug')->nullable();
            $table->mediumText('desc')->nullable();
            $table->integer('parent_id')->nullable();
            $table->integer('sort')->nullable();
            $table->boolean('status')->nullable();
            $table->boolean('show_home')->nullable();
            $table->boolean('show_menu')->nullable();
            $table->string('m_image')->nullable();
            $table->string('d_image')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
            $table->string('color_code', 250)->nullable();
            $table->integer('courses_id')->nullable();
            $table->date('end_time')->nullable();
            $table->boolean('enable_free')->nullable()->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
