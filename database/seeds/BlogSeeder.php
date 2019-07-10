<?php

use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->info('Truncating Blog, Category tables');
        $this->truncateBlogTables();

        // Create a new category
        $this->command->info('Creating Category');

        $categories = factory(App\Category::class, 10)->create();
        

        // Create a new post
        $this->command->info('Creating Post');

        $posts = factory(App\Post::class, 20)->create();
        foreach($posts as $post){
            $post->categories()->attach( rand(1, 10) );
        }

    }

    public function truncateBlogTables()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('category_post')->truncate();
        \App\Post::truncate();
        \App\Category::truncate();
        Schema::enableForeignKeyConstraints();
    }
}
