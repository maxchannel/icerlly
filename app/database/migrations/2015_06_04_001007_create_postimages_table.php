<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostimagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('postimages', function(Blueprint $table)
		{
			$table->increments('id');

			$table->integer('post_id')->unsigned();
			$table->string('name');

			$table->foreign('post_id')->references('id')->on('posts');

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
		Schema::drop('postimages');
	}

}
