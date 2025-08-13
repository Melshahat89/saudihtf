<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSubscriptionuserIdColumnToCourseenrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('courseenrollment', function (Blueprint $table) {
            $table->integer('subscriptionuser_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courseenrollment', function (Blueprint $table) {
            $table->dropColumn('subscriptionuser_id');
        });
    }
}
