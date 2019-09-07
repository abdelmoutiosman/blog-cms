<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	public function up()
	{
		Schema::create('posts', function(Blueprint $table) {
			$table->increments('id');
            $table->integer('user_id')->default(1);
			$table->string('title');
			$table->longText('content');
			$table->integer('category_id')->unsigned();
			$table->string('featured');
            $table->string('slug');
			$table->softDeletes();
			$table->timestamps();
		});
	}

	public function down()
	{
		Schema::drop('posts');
	}
}