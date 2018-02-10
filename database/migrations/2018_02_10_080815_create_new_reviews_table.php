<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function(Blueprint $table)
            {
                $table->increments('id');
                $table->integer('id_user');
                $table->integer('id_res');
                $table->date('date');
                $table->string('review');
                $table->double('score', 3, 1);
                $table->timestamps();
                // $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
                // $table->foreign('id_res')->references('id')->on('restaurans')->onDelete('cascade');
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
