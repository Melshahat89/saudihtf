<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterrequestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('masterrequest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('qualification')->nullable();
            $table->string('collage_name')->nullable();
            $table->string('section')->nullable();
            $table->string('g_year')->nullable();
            $table->string('address')->nullable();
            $table->text('documentation')->nullable();
            $table->tinyInteger('status')->nullable()->default(0);
            $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('courses_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('masterrequest');
    }
}
