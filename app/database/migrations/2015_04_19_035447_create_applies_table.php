<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAppliesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('applies', function(Blueprint $table)
		{
			$table->increments('id');

			$table->string('full_name');
			$table->string('username');
			$table->string('telephone');
			$table->integer('user_id')->unsigned();
			$table->string('account');
			$table->boolean('adsense');

			$table->foreign('user_id')->references('id')->on('users');

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
		Schema::drop('applies');
	}

}
