<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_user', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('challenge_id')->unsigned()->index();
            $table->foreign('challenge_id')->references('id')->on('challenges')->onDelete('cascade');
//            $table->integer('file_id')->unsigned();
//            $table->foreign('file_id')->references('id')->on('files');

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
        Schema::drop('challenge_user');
    }
}
