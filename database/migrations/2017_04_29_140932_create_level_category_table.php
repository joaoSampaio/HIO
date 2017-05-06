<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLevelCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_level', function (Blueprint $table) {

            $table->integer('category_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->index(['category_id', 'user_id']);
            $table->integer('level', 2);
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
