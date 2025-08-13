<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionquizquestionssectionquizchoiseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("sectionquizchoise", "sectionquizquestions_id"))
		{
	Schema::table("sectionquizchoise", function (Blueprint $table)  {
		$table->integer("sectionquizquestions_id")->unsigned();

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
		if (Schema::hasColumn("sectionquizchoise", "sectionquizquestions_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("sectionquizchoise");
			Schema::table("sectionquizchoise", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("sectionquizchoise_sectionquizquestions_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("sectionquizchoise_sectionquizquestions_id_foreign");
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
