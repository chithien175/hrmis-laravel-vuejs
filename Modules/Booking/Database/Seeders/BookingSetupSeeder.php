<?php

namespace Modules\Booking\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\Booking\Entities\Room;

class BookingSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Truncating room table');

        Schema::disableForeignKeyConstraints();
        Room::truncate();
        Schema::enableForeignKeyConstraints();

        // Create a new product
        $this->command->info('Creating Room');

        for($i=0; $i<20; $i++){
            $room = Room::create([
                'name'          => 'Phòng dữ liệu mẫu '.($i+1),
                'slug'          => 'phong-du-lieu-mau-'.($i+1),
                'photo'         => 'room-image-default.jpg',
                'description'   => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Fugit temporibus delectus consectetur impedit facere ut ipsum ipsa, laborum accusantium recusandae illum eum voluptatem dolorum veritatis magnam libero amet.',
                'publish'       => 'publish',
                'counter'       => 0,
                'price'         => 'Liên hệ',
                'user_id'       => 1,
                'created_at'    => Carbon::now()
            ]);
        }
    }
}
