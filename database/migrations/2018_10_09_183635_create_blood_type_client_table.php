<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBloodTypeClientTable extends Migration {

	public function up()
	{
		Schema::create('blood_type_client', function(Blueprint $table) { 
			
			$table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');
 
			$table->integer('blood_type_id')->unsigned()->nullable();
            $table->foreign('blood_type_id')->references('id')->on('blood_types')->onDelete('cascade'); 
            
            $table->primary(['client_id','blood_type_id']);
		});
	}

	public function down()
	{
		Schema::drop('blood_type_client');
	}
}