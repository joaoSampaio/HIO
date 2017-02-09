<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMailRemindsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mail_reminds', function (Blueprint $table) {
            $table->increments('id');
            $table->string('userIdOrEmail');
            $table->uuid('uuid');
            $table->foreign('challenge_id')->references('id')->on('challenges');
            $table->integer('challenge_id')->unsigned()->index();
            $table->boolean('reminded')->default(false);
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
        Schema::drop('mail_reminds');
    }
}
