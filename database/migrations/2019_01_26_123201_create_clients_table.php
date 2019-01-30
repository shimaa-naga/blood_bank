<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClientsTable extends Migration {

	public function up()
	{
		Schema::create('clients', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->string('email', 100);
			$table->date('dob');
			$table->string('phone');
			$table->string('password', 100);
			$table->date('donation_last_date');
			$table->integer('city_id')->unsigned();
			$table->string('blood_type', 50);
			$table->integer('blood_type_id')->unsigned();
			$table->boolean('is_active');
			$table->string('api_token', 100)->nullable();
			$table->timestamp('email_verified_at');
			$table->string('pin_code', 10)->nullable();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}