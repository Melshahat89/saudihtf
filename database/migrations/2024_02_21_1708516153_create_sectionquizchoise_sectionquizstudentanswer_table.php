<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizchoisesectionquizstudentanswerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquizstudentanswer", "sectionquizchoise_id"))
		{
	Schema::table("sectionquizstudentanswer", function (Blueprint $table)  {
		$table->integer("sectionquizchoise_id")->unsigned();

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
		if (Schema::hasColumn("sectionquizstudentanswer", "sectionquizchoise_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquizstudentanswer");
			Schema::table("sectionquizstudentanswer", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquizstudentanswer_sectionquizchoise_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquizstudentanswer_sectionquizchoise_id_foreign");
					$table->dropColumn("sectionquizchoise_id");
				}else{
					$table->dropColumn("sectionquizchoise_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
