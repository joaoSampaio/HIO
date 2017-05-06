<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelupChallengeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('challenge_levelup', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('sub-title');
            $table->foreign('category_id')->references('id')->on('challenge_category');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('level');
            $table->integer('difficulty');

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
        //
    }
}
