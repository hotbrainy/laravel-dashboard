<?php

use Illuminate\Database\Seeder;

class AppSettings extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('app_settings')->insert([
            'last_updated_from' => '1',
            'default_article_low_price' => config('app.default_low_price'),
            'default_article_normal_price' => config('app.default_normal_price'),
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
}
