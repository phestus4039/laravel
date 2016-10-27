<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFundTblsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_fund_tbls', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('user_id');
			$table->string('amount');
			$table->string('transaction_id');
			$table->string('bank_name');
			$table->string('account_no');
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
		Schema::drop('user_fund_tbls');
	}

}
