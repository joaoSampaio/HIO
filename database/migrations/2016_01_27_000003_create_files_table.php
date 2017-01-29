<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('files', function (Blueprint $table) {
//            $table->increments('id');
//            $table->tinyInteger('type');
//            $table->integer('views');
//            $table->integer('likes');
//            $table->foreign('user_id')->references('id')->on('users');
//            $table->integer('user_id')->unsigned()->index();
//            $table->foreign('challenge_id')->references('id')->on('challenges');
//            $table->integer('challenge_id')->unsigned()->index();
//            $table->string('filename');
//            $table->timestamps();
//        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('files');
    }
}
