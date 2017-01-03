<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNotificationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('notifications', function (Blueprint $table) {
            $table->increments('id');
            $table->foreign('recipient_id')->references('id')->on('users');
            $table->integer('recipient_id')->unsigned()->index();
            $table->foreign('sender_id')->references('id')->on('users');
            $table->integer('sender_id')->unsigned()->index();
            $table->boolean('unread')->default(true);
            $table->string('type');
            $table->text('parameters');
            $table->integer('reference_id');
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
