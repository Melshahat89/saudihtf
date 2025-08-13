<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizsectionquizquestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquizquestions", "sectionquiz_id"))
		{
	Schema::table("sectionquizquestions", function (Blueprint $table)  {
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
		if (Schema::hasColumn("sectionquizquestions", "sectionquiz_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquizquestions");
			Schema::table("sectionquizquestions", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquizquestions_sectionquiz_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquizquestions_sectionquiz_id_foreign");
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
