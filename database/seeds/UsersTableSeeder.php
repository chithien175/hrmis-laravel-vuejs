<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thiện Phạm',
            'email' => 'it@thinhphongme.vn',
            'bio' => 'Đây là mô tả của Thiện',
            'type' => 'admin',
            'photo' => 'profile.png',
            'password' => bcrypt('admin@123'),
            'created_at' => Carbon::now()
        ]);
    }
}
