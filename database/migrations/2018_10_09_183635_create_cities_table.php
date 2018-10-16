<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCitiesTable extends Migration {

	public function up()
	{
		Schema::create('cities', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps();
			$table->string('name'); 
 
			$table->integer('governorate_id')->unsigned()->nullable();
            $table->foreign('governorate_id')->references('id')->on('governorates')->onDelete('cascade');

		});
	}

	public function down()
	{
		Schema::drop('cities');
	}
}