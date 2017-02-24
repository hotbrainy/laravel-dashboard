<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ArticleUsedPrice extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::table('articles', function($table) {
            $table->integer('sale_with')->default('0')->after('approved_by_id');
            $table->integer('used_by')->default('0')->after('approved_by_id');
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
        Schema::table('articles', function($table) {
            $table->dropColumn('sale_with');
            $table->dropColumn('used_by');
        });
    }
}
