<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBuyAirtimeTblsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_buy_airtime_tbls', function(Blueprint $table)
		{
			$table->increments('id');
				$table->string('user_id');
					$table->string('amount');
						$table->string('network');
							$table->string('phonenumber');
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
		Schema::drop('user_buy_airtime_tbls');
	}

}
