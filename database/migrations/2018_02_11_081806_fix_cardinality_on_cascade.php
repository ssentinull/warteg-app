<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
// use DB;

class FixCardinalityOnCascade extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::query('ALTER TABLE `menus` MODIFY `id_res` ON DELETE CASCADE;');
        DB::query('ALTER TABLE `reviews` MODIFY `id_user` ON DELETE CASCADE;');
        DB::query('ALTER TABLE `reviews` MODIFY `id_res` ON DELETE CASCADE;');
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
