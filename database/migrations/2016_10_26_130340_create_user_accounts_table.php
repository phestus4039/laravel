<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('user_accounts', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('phonenumber')->unique();
			$table->string('password', 60);
			$table->string('Firstname');
			$table->string('Surname');
			$table->string('Email');
			$table->string('Dob');
			$table->string('Sex');
			$table->string('Address');
			$table->string('State')->nullable();
			$table->string('LGA')->nullable();
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
		Schema::drop('user_accounts');
	}

}
