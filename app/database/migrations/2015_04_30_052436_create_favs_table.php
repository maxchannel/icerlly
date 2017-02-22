<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateFavsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('favs', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('post_id')->unsigned();
			$table->integer('user_id')->unsigned();

			$table->foreign('post_id')->references('id')->on('posts');
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
		Schema::drop('favs');
	}

}
