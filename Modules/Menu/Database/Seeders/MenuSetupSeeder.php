<?php

namespace Modules\Menu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Modules\Menu\Entities\Menu;
use Modules\Menu\Entities\MenuItem;

class MenuSetupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Truncating Menu, MenuItem tables');
        Schema::disableForeignKeyConstraints();
        MenuItem::truncate();
        Menu::truncate();
        Schema::enableForeignKeyConstraints();

        // Create a new menu
        $this->command->info('Creating Menu');

        $category = Menu::create([
            'name'          => 'frontend',
            'created_at'    => Carbon::now()
        ]);
        $category = Menu::create([
            'name'          => 'backend',
            'created_at'    => Carbon::now()
        ]);

        // Create a new menuitem
        $this->command->info('Creating MenuItem');

        $menu = Menu::where('name', 'frontend')->firstOrFail();

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Giới thiệu',
            'url'     => '',
            'route'   => 'frontend.pages.about',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => '',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 1,
            ])->save();
        }

        $menuItem = MenuItem::firstOrNew([
            'menu_id' => $menu->id,
            'title'   => 'Liên hệ',
            'url'     => '',
            'route'   => 'frontend.pages.contact',
        ]);
        if (!$menuItem->exists) {
            $menuItem->fill([
                'target'     => '_self',
                'icon_class' => '',
                'color'      => null,
                'parent_id'  => null,
                'order'      => 2,
            ])->save();
        }
    }
}
