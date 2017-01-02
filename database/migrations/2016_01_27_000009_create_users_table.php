<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->text('about');
            $table->text('achievements');
            $table->string('sports');
            $table->string('facebook_id');
            $table->string('facebook_token');
            $table->string('gender');
            $table->text('friends');
            $table->string('location');
            $table->string('role');
            $table->string('address');
            $table->string('interests');
            $table->date('birthday');
            $table->string('password', 60);
            $table->string('photo', 40);
            $table->boolean('public')->default(true);
            $table->boolean('activated')->default(false);
            $table->rememberToken();
            $table->timestamps();
        });
    }
//'name', 'email', 'about', 'picture', 'sports', 'avatar', 'facebook_id',
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
