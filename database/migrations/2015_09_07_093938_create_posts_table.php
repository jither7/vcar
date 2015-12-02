<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
			$table->string('title');
			$table->integer('term_id');
			$table->string('featured_image');
			$table->integer('author');
			$table->integer('status');
			$table->json('tags');
			$table->string('guid');
			$table->text('description');
			$table->string('meta_keywords');
			$table->string('meta_description');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('posts');
    }
}
