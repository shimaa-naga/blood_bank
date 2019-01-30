<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGovernoratesTable extends Migration {

	public function up()
	{
		Schema::create('governorates', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name', 50);
			$table->timestamps();
		});

		\App\Governorate::create([
			'name'=>'test'
		]);
		\App\Governorate::create([
			'name'=>'test2'
		]);
		\App\Governorate::create([
			'name'=>'test3'
		]);
	}

	public function down()
	{
		Schema::drop('governorates');
	}
}