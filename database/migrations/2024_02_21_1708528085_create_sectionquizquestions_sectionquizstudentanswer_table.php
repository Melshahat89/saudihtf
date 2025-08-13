<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizquestionssectionquizstudentanswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquizstudentanswer", "sectionquizquestions_id"))
		{
	        Schema::table("sectionquizstudentanswer", function (Blueprint $table)  {
		        $table->integer("sectionquizquestions_id")->unsigned();

	});		}
//todo
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
    	Schema::disableForeignKeyConstraints();
		if (Schema::hasColumn("sectionquizstudentanswer", "sectionquizquestions_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquizstudentanswer");
			Schema::table("sectionquizstudentanswer", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquizstudentanswer_sectionquizquestions_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquizstudentanswer_sectionquizquestions_id_foreign");
					$table->dropColumn("sectionquizquestions_id");
				}else{
					$table->dropColumn("sectionquizquestions_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
