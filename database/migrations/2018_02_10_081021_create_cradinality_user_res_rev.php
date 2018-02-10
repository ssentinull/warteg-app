<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCradinalityUserResRev extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       Schema::table('reviews', function($table) 
        {
            $table->integer('id_user')->unsigned()->change();
            $table->integer('id_res')->unsigned()->change();
        });

       Schema::table('reviews', function($table) 
        {
            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_res')->references('id')->on('restaurants');
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
