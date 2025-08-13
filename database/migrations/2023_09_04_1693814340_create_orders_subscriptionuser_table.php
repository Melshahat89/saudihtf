<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderssubscriptionuserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
    		if (!Schema::hasColumn("subscriptionuser", "orders_id"))
		{
	Schema::table("subscriptionuser", function (Blueprint $table)  {
		$table->integer("orders_id")->unsigned();

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
		if (Schema::hasColumn("subscriptionuser", "orders_id"))
		{
			$arrayOfKeys = $this->listTableForeignKeys("subscriptionuser");
			Schema::table("subscriptionuser", function ($table) use ($arrayOfKeys) {
			Schema::disableForeignKeyConstraints();
				if(in_array("subscriptionuser_orders_id_foreign" , $arrayOfKeys)){
					$table->dropForeign("subscriptionuser_orders_id_foreign");
					$table->dropColumn("orders_id");
				}else{
					$table->dropColumn("orders_id");
				}
			Schema::enableForeignKeyConstraints();
			});
		}
		Schema::enableForeignKeyConstraints();

    }
}
