<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCityClientTable extends Migration {

	public function up()
	{
		Schema::create('city_client', function(Blueprint $table) { 
			
 			$table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
 
			$table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade'); 
            
            $table->primary(['city_id','client_id']);
		});
	}

	public function down()
	{
		Schema::drop('city_client');
	}
}