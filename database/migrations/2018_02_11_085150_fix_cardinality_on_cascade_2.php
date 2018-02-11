<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FixCardinalityOnCascade2 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::query('ALTER TABLE `users` MODIFY `id` ON DELETE CASCADE;');
        // DB::query('ALTER TABLE `restaurants` MODIFY `id` ON DELETE CASCADE;');
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
