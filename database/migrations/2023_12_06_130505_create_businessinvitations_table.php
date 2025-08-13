<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessinvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('businessinvitations', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('name', 255);
            $table->integer('invitationslimit')->nullable();
            $table->integer('businessdata_id');
            $table->string('token', 255);
            $table->integer('group_id')->nullable();
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
        Schema::dropIfExists('businessinvitations');
    }
}
