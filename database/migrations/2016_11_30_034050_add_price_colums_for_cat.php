<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPriceColumsForCat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('categories', function($table) {
            $table->integer('low_price')->after('made_by_id');
            $table->integer('normal_price')->after('made_by_id');
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
        Schema::table('categories', function($table) {
            $table->dropColumn('low_price');
            $table->dropColumn('normal_price');
        });
    }
}
