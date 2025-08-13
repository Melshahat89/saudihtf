<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOrdersIdColumnToCertificatesenrollmentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('certificatesenrollment', function (Blueprint $table) {
            //
            $table->foreignId('orders_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('certificatesenrollment', function (Blueprint $table) {
            //
            $table->dropColumn('orders_id');
        });
    }
}
