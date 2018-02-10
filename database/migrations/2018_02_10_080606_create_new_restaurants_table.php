<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('restaurants', function(Blueprint $table)
        //     {
        //         $table->increments('id');
        //         $table->string('name');
        //         $table->string('road_name');
        //         $table->string('cuisine_type');
        //         $table->string('opening_hour');
        //         $table->string('closing_hour');
        //         $table->double('avg_cost');
        //         $table->timestamps();
        //     });

        // statement for adding latitude and longitude to table
        // DB::statement('ALTER TABLE restaurants ADD location POINT');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('new_restaurants');
    }
}
