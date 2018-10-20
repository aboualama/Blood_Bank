<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
			$table->timestamps(); 
			$table->string('title');
			$table->text('content');
			$table->string('thumbnail')->nullable();
			$table->date('publish_date'); 

			$table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                  ->onUpdate('cascade')->onDelete('cascade');


			$table->integer('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')
                  ->onUpdate('cascade')->onDelete('cascade');

		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}