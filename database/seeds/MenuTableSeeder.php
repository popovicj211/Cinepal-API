<?php

use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $links = [
             [
                 'name' => 'Home',
                 'link' => '/home',
                   'parent_id' => null,
                'created_at' => now()
             ],
            [
                'name' => 'Movies',
                'link' => '/movies',
                'parent_id' => null,
                'created_at' => now()
            ],
            [
                'name' => 'Contact',
                'link' => '/contact',
                'parent_id' => null,
                'created_at' => now()
            ],
            [
                'name' => 'Admin',
                'link' => '/admin',
                'parent_id' => null,
                'created_at' => now()
            ]
        ];
        foreach ($links as $link){
            Menu::create($link);
        }
    }
}
