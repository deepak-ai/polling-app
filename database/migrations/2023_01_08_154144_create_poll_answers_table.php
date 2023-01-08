<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePollAnswersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('poll_answers', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('poll_id')->unsigned();
            $table->bigInteger('constituency_id')->unsigned();
            $table->bigInteger('poll_option_id')->unsigned();
            $table->integer('votes');
            $table->timestamps();
            $table->foreign('poll_id')->references('id')->on('polls')->onDelete('cascade');
            $table->foreign('constituency_id')->references('id')->on('constituencies');
            $table->foreign('poll_option_id')->references('id')->on('poll_options');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('poll_answers');
    }
}
