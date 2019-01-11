<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

	public function up()
	{
		Schema::create('orders', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 100);
			$table->integer('age');
			$table->tinyInteger('number_of_bags');
			$table->string('hospital_name', 100);
			$table->float('latitude', 100);
			$table->float('longitude', 100);
			$table->string('blood_type', 50);
			$table->integer('city_id')->unsigned();
			$table->string('phone', 20);
			$table->text('details');
			$table->integer('client_id')->unsigned();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('orders');
	}
}