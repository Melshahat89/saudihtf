<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesectionssectionquizTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquiz", "coursesections_id"))
		{
	Schema::table("sectionquiz", function (Blueprint $table)  {
		$table->integer("coursesections_id")->unsigned();

	});		}

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::disableForeignKeyConstraints();
		if (Schema::hasColumn("sectionquiz", "coursesections_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquiz");
			Schema::table("sectionquiz", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquiz_coursesections_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquiz_coursesections_id_foreign");
					$table->dropColumn("coursesections_id");
				}else{
					$table->dropColumn("coursesections_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
