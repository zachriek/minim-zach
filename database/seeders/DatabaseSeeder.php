<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PhotoGallery;
use App\Models\Menu;
use App\Models\SubMenu;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        Menu::create([
            'menu' => 'Gallery'
        ]);

        Menu::create([
            'menu' => 'Profile'
        ]);

        SubMenu::create([
            'menu_id' => 1,
            'title' => 'Photos',
            'url' => "{{ route('gallery-photos') }}",
            'icon' => "fas fa-fw fa-images",
            'is_active' => 1
        ]);

        SubMenu::create([
            'menu_id' => 1,
            'title' => 'Videos',
            'url' => "{{ route('gallery-videos') }}",
            'icon' => "fas fa-fw fa-film",
            'is_active' => 1
        ]);

        SubMenu::create([
            'menu_id' => 2,
            'title' => 'My Profile',
            'url' => "{{ route('profile-myprofile') }}",
            'icon' => "fas fa-fw fa-user-circle",
            'is_active' => 1
        ]);
    }
}
