<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->integer('governorate_id')->unsigned();
			$table->timestamp('timestamps');
		});

		\App\City::create([
			'name'=> 'city1',
			'governorate_id'=>1
		]);
		\App\City::create([
			'name'=> 'city1',
			'governorate_id'=>2
		]);
		\App\City::create([
			'name'=> 'city1',
			'governorate_id'=>3
		]);
	}

	public function down()
	{
		Schema::drop('cities');
	}
}