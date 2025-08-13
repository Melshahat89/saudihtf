<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizsectionquizstudentstatusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquizstudentstatus", "sectionquiz_id"))
		{
	Schema::table("sectionquizstudentstatus", function (Blueprint $table)  {
		$table->integer("sectionquiz_id")->unsigned();

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
		if (Schema::hasColumn("sectionquizstudentstatus", "sectionquiz_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquizstudentstatus");
			Schema::table("sectionquizstudentstatus", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquizstudentstatus_sectionquiz_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquizstudentstatus_sectionquiz_id_foreign");
					$table->dropColumn("sectionquiz_id");
				}else{
					$table->dropColumn("sectionquiz_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
