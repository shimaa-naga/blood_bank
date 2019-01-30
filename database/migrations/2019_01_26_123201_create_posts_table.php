<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->string('title', 100);
			$table->string('image', 100);
			$table->integer('category_id')->unsigned();
			$table->text('content');
			$table->timestamp('timestamps');
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}