<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('article_id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('summary');
            $table->text('cat');
            $table->string('lang');
            $table->text('text');
            $table->text('thumbnail');
            $table->integer('total_words');
            $table->integer('total_chars');
            $table->integer('total_paras');
            $table->string('status');
            $table->integer('approved_by_id');
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
        Schema::drop('articles');
    }
}
