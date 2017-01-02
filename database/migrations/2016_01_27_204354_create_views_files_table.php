<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateViewsFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files_views', function (Blueprint $table) {
            $table->integer('id')->index();
            $table->integer('file_id')->unsigned()->index();
            $table->integer('user_id')->unsigned();
            $table->timestamps();

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
        Schema::drop('files_views');
    }
}
