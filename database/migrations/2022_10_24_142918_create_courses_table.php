<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title')->nullable();
            $table->string('slug')->nullable();
            $table->text('description')->nullable();
            $table->string('welcome_message')->nullable();
            $table->string('congratulation_message')->nullable();
            $table->integer('type')->nullable()->default(1);
            $table->integer('skill_level')->nullable()->default(0)->comment('0 = Beginner, 1 = Intermediate, 2 = Expert, ');
            $table->integer('language_id')->nullable();
            $table->boolean('has_captions')->nullable()->default(true)->comment('0 =Can\'t create coupons for this course, 1 = Can create coupons for this course ');
            $table->boolean('has_certificate')->nullable()->comment('0 = haven\'t , 1 = have ');
            $table->integer('length')->nullable()->comment('Course Length in minutes ');
            $table->double('price')->nullable()->comment('0 = Free ');
            $table->double('price_in_dollar')->nullable();
            $table->integer('affiliate1_per')->nullable()->default(0);
            $table->integer('affiliate2_per')->nullable()->default(0);
            $table->integer('affiliate3_per')->nullable()->default(0);
            $table->integer('affiliate4_per')->nullable()->default(0);
            $table->integer('instructor_per')->nullable();
            $table->double('discount_egp')->nullable();
            $table->double('discount_usd')->nullable();
            $table->boolean('featured')->nullable()->default(false);
            $table->string('image')->nullable();
            $table->string('promo_video')->nullable();
            $table->string('visits')->nullable();
            $table->boolean('published')->nullable();
            $table->integer('position')->nullable();
            $table->integer('sort')->nullable()->default(9999999);
            $table->string('doctor_name')->nullable();
            $table->boolean('full_access')->nullable()->comment('full time access = 1 , not = 0 ');
            $table->integer('access_time')->nullable()->comment('per day');
            $table->boolean('soon')->nullable()->default(false);
            $table->text('seo_desc')->nullable();
            $table->text('seo_keys')->nullable();
            $table->text('search_keys')->nullable();
            $table->string('poster')->nullable();
            $table->string('promoPoster', 250)->nullable();
            $table->timestamps();
            $table->unsignedInteger('categories_id')->index('courses_categories_id_foreign');
            $table->integer('instructor_id')->nullable();
            $table->text('will_learn')->nullable();
            $table->text('requirments')->nullable();
            $table->text('description_large')->nullable();
            $table->text('target_students')->nullable();
            $table->tinyInteger('is_partnership')->nullable()->default(0);
            $table->string('other_categories', 255)->nullable();
            $table->string('lectures_link', 255)->nullable();
            $table->tinyInteger('videosready')->nullable()->default(0);
            $table->integer('sales_count')->nullable()->default(0);
            $table->dateTime('start_date')->nullable();
            $table->string('certificates', 200)->nullable();
            $table->text('accreditation_text')->nullable();
            $table->string('vdocipher_tag', 255)->nullable();
            $table->string('webinar_url', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
