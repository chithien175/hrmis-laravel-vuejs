<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pages')->insert([
            'title'         => 'Trang chủ',
            'slug'          => 'trang-chu',
            'photo'         => 'page-image-default.jpg',
            'body'          => '',
            'publish'       => 'publish',
            'counter'       => 0,
            'user_id'       => 1,
            'is_homepage'   => 1,
            'created_at'    => Carbon::now()
        ]);

        DB::table('pages')->insert([
            'title'         => 'Giới thiệu',
            'slug'          => 'gioi-thieu',
            'photo'         => 'page-image-default.jpg',
            'body'          => '',
            'publish'       => 'publish',
            'counter'       => 0,
            'user_id'       => 1,
            'is_homepage'   => 0,
            'created_at'    => Carbon::now()
        ]);

        DB::table('pages')->insert([
            'title'         => 'Tin tức',
            'slug'          => 'tin-tuc',
            'photo'         => 'page-image-default.jpg',
            'body'          => '',
            'publish'       => 'publish',
            'counter'       => 0,
            'user_id'       => 1,
            'is_homepage'   => 0,
            'created_at'    => Carbon::now()
        ]);

        DB::table('pages')->insert([
            'title'         => 'Liên hệ',
            'slug'          => 'lien-he',
            'photo'         => 'page-image-default.jpg',
            'body'          => '',
            'publish'       => 'publish',
            'counter'       => 0,
            'user_id'       => 1,
            'is_homepage'   => 0,
            'created_at'    => Carbon::now()
        ]);
    }
}
