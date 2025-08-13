<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizstudentstatussectionquizstudentanswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquizstudentanswer", "sectionquizstudentstatus_id"))
		{
	Schema::table("sectionquizstudentanswer", function (Blueprint $table)  {
		$table->integer("sectionquizstudentstatus_id")->unsigned();

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
		if (Schema::hasColumn("sectionquizstudentanswer", "sectionquizstudentstatus_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquizstudentanswer");
			Schema::table("sectionquizstudentanswer", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquizstudentanswer_sectionquizstudentstatus_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquizstudentanswer_sectionquizstudentstatus_id_foreign");
					$table->dropColumn("sectionquizstudentstatus_id");
				}else{
					$table->dropColumn("sectionquizstudentstatus_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
