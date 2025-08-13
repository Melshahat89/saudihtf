<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursewishlistTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coursewishlist', function (Blueprint $table) {
            $table->increments('id');
            $table->string('note')->nullable();
            $table->timestamps();
            $table->unsignedInteger('user_id')->index('coursewishlist_user_id_foreign');
            $table->unsignedInteger('courses_id')->index('coursewishlist_courses_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coursewishlist');
    }
}
