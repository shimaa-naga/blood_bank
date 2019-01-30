<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSettingsTable extends Migration {

	public function up()
	{
		Schema::create('settings', function(Blueprint $table) {
			$table->increments('id');
			$table->string('site_name', 150);
			$table->text('about');
			$table->string('phone', 20);
			$table->string('email', 150);
			$table->string('android_app_url', 150);
			$table->string('ios_app_url', 150);
			$table->string('facebook_url', 150);
			$table->string('whatsapp_url', 150);
			$table->string('instgram_url', 150);
			$table->string('youtube_url', 150);
			$table->string('twitter_url', 150);
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('settings');
	}
}