<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChallengesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->increments('id');
            $table->uuid('uuid');
            $table->string('title');
            $table->boolean('public')->default(true);
            $table->integer('category');
            $table->text('description');
            $table->string('reward');
            $table->string('penalty');
            $table->dateTime('deadLine');
            $table->timestamps();
            $table->boolean('closed')->default(false);
            $table->boolean('judged')->default(false);
            $table->boolean('reminded')->default(false);
            $table->integer('creator_id')->unsigned();
            $table->integer('rank')->unsigned();
            $table->integer('secret')->unsigned();
//            $table->foreign('creator_id')->references('id')->on('users');
        });
    }
    //nameCreator', 'emailCreator','nameFriend', 'emailFriend
//'name', 'email', 'about', 'picture', 'sports', 'avatar', 'facebook_id',
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('challenges');
    }
}
