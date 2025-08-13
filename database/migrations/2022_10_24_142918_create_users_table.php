<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unique('id');
            $table->string('name');
            $table->string('email');
            $table->string('password');
            $table->integer('group_id')->nullable()->default(2)->comment('1= Admin ,2=user , 3 = instructor');
            $table->string('mobile', 25)->nullable();
            $table->string('api_token')->nullable();
            $table->rememberToken();
            $table->string('facebook_identifier', 255)->nullable();
            $table->timestamps();
            $table->boolean('verified')->nullable()->default(true);
            $table->boolean('activated')->nullable()->default(true);
            $table->string('activation_code', 250)->nullable();
            $table->string('activation_date', 250)->nullable();
            $table->boolean('banned')->nullable()->default(false);
            $table->string('first_name', 250)->nullable();
            $table->string('last_name', 250)->nullable();
            $table->boolean('gender')->nullable();
            $table->date('birthdate')->nullable();
            $table->integer('is_affiliate')->nullable();
            $table->integer('affiliate_id')->nullable();
            $table->string('title', 500)->nullable();
            $table->longText('about')->nullable();
            $table->longText('additional_info')->nullable();
            $table->longText('description')->nullable();
            $table->string('image', 250)->nullable();
            $table->string('cover', 250)->nullable();
            $table->string('slug', 200)->nullable();
            $table->string('specialization', 100)->nullable();
            $table->string('sub_specialization', 100)->nullable();
            $table->string('other_specialization', 100)->nullable();
            $table->integer('businessdata_id')->nullable();
            $table->string('instructorname', 255)->nullable();
            $table->integer('is_instructor')->nullable()->default(0);
            $table->integer('sort')->nullable()->default(9999999);
            $table->boolean('hidden')->nullable()->default(false);
            $table->string('categories', 100)->nullable();
            $table->string('otp', 50)->nullable();
            $table->integer('country_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
