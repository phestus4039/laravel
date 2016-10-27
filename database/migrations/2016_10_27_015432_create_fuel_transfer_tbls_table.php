<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFuelTransferTblsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('fuel_transfer_tbls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id')->index();
			$table->string('to_user_id');
			$table->string('amount');
			$table->string('transaction_id');
			$table->string('phonenumber');
			$table->string('user_id_name');
			$table->string('to_id_name');
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
		Schema::drop('fuel_transfer_tbls');
	}

}
