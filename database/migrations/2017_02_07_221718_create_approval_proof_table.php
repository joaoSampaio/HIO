<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApprovalProofTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proof_approval', function (Blueprint $table) {

            $table->integer('proof_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->index(['proof_id', 'user_id']);
            $table->integer('judgment', 2);
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
