<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBuyFuelTblsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_buy_fuel_tbls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id');
			$table->string('station');
			$table->decimal('amount',5, 2);
			$table->string('litres');
			$table->string('transaction_id');
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('user_buy_fuel_tbls');
	}

}
