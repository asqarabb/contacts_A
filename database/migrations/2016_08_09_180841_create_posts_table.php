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
            $table->integer('destination_user_id');
            $table->integer('creator_post_id');
            $table->text('text');
            $table->string('picture_name');
            $table->dateTime('time_visit');
            $table->timestamps();
        });
        Schema::create('post_user', function (Blueprint $table) {
                $table->integer('user_id')->unsigned()->index();
                $table->integer('post_id')->unsigned()->index();

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('post_user');
        Schema::drop('posts');
    }
}
