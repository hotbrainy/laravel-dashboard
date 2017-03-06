<?php

use Illuminate\Database\Seeder;

class UserAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => config('app.name').' '.'Admin',
            'email' => 'affan502@outlook.com',
            'password' => bcrypt('admin@123'),
            'is_admin' => true,
            'verification_code' => '',
            'settings' => '',
            'settings' => '',
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);

        DB::table('profile')->insert([
            'avatar' => '/img/palce-holder.png',
            'user_id' => '1',
            "created_at" =>  \Carbon\Carbon::now(),
            "updated_at" => \Carbon\Carbon::now(),
        ]);
    }
}
