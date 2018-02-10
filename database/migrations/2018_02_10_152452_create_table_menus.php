<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableMenus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('menus', function(Blueprint $table)
        // 	{
        // 		$table->increments('id');
        // 		$table->integer('id_res')->unsinged();
        // 		$table->string('name');
        // 		$table->string('type');
        // 		$table->integer('price');
        // 		$table->timestamps();
        // 	});

        // Schema::table('menus', function($table)
        // 	{
        // 			$table->foreign('id_res')->references('id')->on('restaurants');
        // 	});

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
