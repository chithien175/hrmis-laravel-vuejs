<?php

namespace Modules\Ecommerce\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\Ecommerce\Entities\Product;
use Modules\Ecommerce\Entities\Category;

class EcommerceSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Truncating products, p_categories tables');

        Schema::disableForeignKeyConstraints();
        DB::table('category_product')->truncate();
        Product::truncate();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        // Create a new category
        $this->command->info('Creating Product Category');

        $category = Category::create([
            'name'          => 'Chưa phân loại',
            'slug'          => 'chua-phan-loai',
            'parent_id'     => 0,
            'created_at'    => Carbon::now()
        ]);
        $category = Category::create([
            'name'          => 'Vải áo dài',
            'slug'          => 'vai-ao-dai',
            'parent_id'     => 0,
            'created_at'    => Carbon::now()
        ]);
        $category = Category::create([
            'name'          => 'Họa tiết áo dài',
            'slug'          => 'hoa-tiet-ao-dai',
            'parent_id'     => 0,
            'created_at'    => Carbon::now()
        ]);

        // Create a new product
        $this->command->info('Creating Product');

        for($i=0; $i<20; $i++){
            $product = Product::create([
                'name'          => 'Áo dài dữ liệu mẫu '.($i+1),
                'slug'          => 'ao-dai-du-lieu-mau-'.($i+1),
                'code'          => 'AD DLM '.($i+1),
                'photo'         => 'product-image-default.jpg',
                'description'          => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.',
                'body'          => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.<br>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.',
                'publish'       => 'publish',
                'counter'       => 0,
                'price'         => 'Liên hệ',
                'user_id'       => 1,
                'created_at'    => Carbon::now()
            ]);
            $product->categories()->attach( ['1' ,'2'] );
        }
    }
}
