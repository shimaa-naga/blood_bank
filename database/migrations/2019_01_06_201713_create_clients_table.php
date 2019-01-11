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
			//$table->boolean('admin');
			$table->date('donation_last_date');
			$table->integer('city_id')->unsigned();
			//$table->string('blood_type', 50);
			$table->enum('blood_type', array('O-','O+','B-','B+','A-','A+','AB-','AB+'));
			$table->integer('blood_type_id')->unsigned();
			$table->boolean('is_active')->default(1);
			$table->string('remember_token', 100)->unique()->nullable();
			//$table->timestamp('email_verified_at');
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('clients');
	}
}