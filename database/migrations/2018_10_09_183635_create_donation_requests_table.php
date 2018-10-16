<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDonationRequestsTable extends Migration {

	public function up()
	{
		Schema::create('donation_requests', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps(); 

			$table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients')->onDelete('cascade');

			$table->integer('city_id')->unsigned()->nullable();
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');

			$table->string('name');
			$table->integer('age');
			$table->enum('blood_type', ['O-', 'O+', 'B-', 'B+', 'A+', 'A-', 'AB-', 'AB+']);
			$table->integer('bags_num');
			$table->string('hospital_name');
			$table->string('hospital_address'); 
			$table->string('phone')->unique();
			$table->text('notes')->nullable();
			$table->double('latitude', 10,8)->nullable();
			$table->double('longitude', 10,8)->nullable();
		});
	}

	public function down()
	{
		Schema::drop('donation_requests');
	}
}