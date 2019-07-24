<?php

namespace Modules\Blog\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\Blog\Entities\Post;
use Modules\Blog\Entities\Category;

class BlogSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Truncating Post, Category tables');

        Schema::disableForeignKeyConstraints();
        DB::table('category_post')->truncate();
        Post::truncate();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        // Create a new category
        $this->command->info('Creating Category');

        $category = Category::create([
            'name'          => 'Chưa phân loại',
            'slug'          => 'chua-phan-loai',
            'parent_id'     => 0,
            'created_at'    => Carbon::now()
        ]);
        $category = Category::create([
            'name'          => 'Thời sự',
            'slug'          => 'thoi-su',
            'parent_id'     => 0,
            'created_at'    => Carbon::now()
        ]);
        $category = Category::create([
            'name'          => 'Thể thao',
            'slug'          => 'the-thao',
            'parent_id'     => 0,
            'created_at'    => Carbon::now()
        ]);

        // Create a new post
        $this->command->info('Creating Post');

        for($i=0; $i<20; $i++){
            $post = Post::create([
                'title'         => 'Bài viết dữ liệu mẫu '.($i+1),
                'slug'          => 'bai-viet-du-lieu-mau-'.($i+1),
                'photo'         => 'post-image-default.jpg',
                'body'          => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.',
                'publish'       => 'publish',
                'counter'        => 0,
                'user_id'       => 1,
                'created_at'    => Carbon::now()
            ]);
            $post->categories()->attach( ['1' ,'2'] );
        }
    }
}