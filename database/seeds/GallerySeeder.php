<?php

use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('galleries')->insert([
            'title'         => 'Slider Trang chủ',
            'slug'          => 'slider-trang-chu',
            'publish'       => 'publish',
            'created_at'    => Carbon::now()
        ]);
    }
}
