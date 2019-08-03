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
        // Dữ liệu mẫu cho trang
        DB::table('pages')->insert([
            'title'         => 'Trang chủ',
            'slug'          => 'trang-chu',
            'photo'         => 'page-image-default.jpg',
            'body'          => '',
            'publish'       => 'publish',
            'counter'       => 0,
            'user_id'       => 1,
            'is_homepage'   => 1,
            'seo_title'     => 'Trang chủ',
            'seo_description'=> 'Trang chủ',
            'seo_keyword'   => 'Trang chủ',
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
            'seo_title'     => 'Giới thiệu',
            'seo_description'=> 'Giới thiệu',
            'seo_keyword'   => 'Giới thiệu',
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
            'seo_title'     => 'Tin tức',
            'seo_description'=> 'Tin tức',
            'seo_keyword'   => 'Tin tức',
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
            'seo_title'     => 'Liên hệ',
            'seo_description'=> 'Liên hệ',
            'seo_keyword'   => 'Liên hệ',
            'created_at'    => Carbon::now()
        ]);

        // Dữ liệu mẫu cho trường tùy chọn
        // About
        DB::table('page_custom_fields')->insert([
            'key'           => 'about.title_banner',
            'display_name'  => 'Tiêu đề biểu ngữ',
            'value'         => 'Về chúng tôi',
            'type'          => 'text',
            'order'         => 1,
            'page_id'       => 2,
            'created_at'    => Carbon::now()
        ]);
        DB::table('page_custom_fields')->insert([
            'key'           => 'about.image_banner',
            'display_name'  => 'Hình ảnh biểu ngữ',
            'value'         => '',
            'type'          => 'image',
            'order'         => 2,
            'page_id'       => 2,
            'created_at'    => Carbon::now()
        ]);
        DB::table('page_custom_fields')->insert([
            'key'           => 'about.image_block1',
            'display_name'  => 'Hình ảnh - Block 1',
            'value'         => '',
            'type'          => 'image',
            'order'         => 3,
            'page_id'       => 2,
            'created_at'    => Carbon::now()
        ]);
        DB::table('page_custom_fields')->insert([
            'key'           => 'about.content_block1',
            'display_name'  => 'Nội dung - Block 1',
            'value'         => "<h3>Variations Of Passages Of Lorem Ipsum Available</h3><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don't look even slightly believable.randomised words which don't look even slightly believable.</p><p>There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised. by injected humour, or randomised.</p><ul><li>There Are Many Variations Of Passages</li><li>By Injected Humour Or Randomised.</li><li>The Majority Have Suffered Alteration</li><li>Majority Have Suffered Alteration</li><li>Variations Of Passages Of Lorem Ipsum</li><li>Of Passages Of Lorem Ipsum</li><li>Many Variations Of Passages.</li></ul>",
            'type'          => 'text_editor',
            'order'         => 4,
            'page_id'       => 2,
            'created_at'    => Carbon::now()
        ]);

        // News
        DB::table('page_custom_fields')->insert([
            'key'           => 'news.title_banner',
            'display_name'  => 'Tiêu đề biểu ngữ',
            'value'         => 'Blog - Tin Tức',
            'type'          => 'text',
            'order'         => 1,
            'page_id'       => 3,
            'created_at'    => Carbon::now()
        ]);
        DB::table('page_custom_fields')->insert([
            'key'           => 'news.image_banner',
            'display_name'  => 'Hình ảnh biểu ngữ',
            'value'         => '',
            'type'          => 'image',
            'order'         => 2,
            'page_id'       => 3,
            'created_at'    => Carbon::now()
        ]);

        // Contact
        DB::table('page_custom_fields')->insert([
            'key'           => 'contact.title_banner',
            'display_name'  => 'Tiêu đề biểu ngữ',
            'value'         => 'Liên hệ chúng tôi',
            'type'          => 'text',
            'order'         => 1,
            'page_id'       => 4,
            'created_at'    => Carbon::now()
        ]);
        DB::table('page_custom_fields')->insert([
            'key'           => 'contact.image_banner',
            'display_name'  => 'Hình ảnh biểu ngữ',
            'value'         => '',
            'type'          => 'image',
            'order'         => 2,
            'page_id'       => 4,
            'created_at'    => Carbon::now()
        ]);
        DB::table('page_custom_fields')->insert([
            'key'           => 'contact.google_map',
            'display_name'  => 'Bản đồ google map',
            'value'         => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3899.131804017386!2d109.19487436434765!3d12.239353733834268!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3170677a356fd213%3A0x5b43e96d048d068c!2sL%E1%BB%99c+Th%E1%BB%8D%2C+Nha+Trang%2C+Khanh+Hoa+Province+650000%2C+Vietnam!5e0!3m2!1sen!2s!4v1564564296514!5m2!1sen!2s" width="100%" height="100%" frameborder="0" style="border:0" allowfullscreen></iframe>',
            'type'          => 'text_area',
            'order'         => 3,
            'page_id'       => 4,
            'created_at'    => Carbon::now()
        ]);
    }
}
