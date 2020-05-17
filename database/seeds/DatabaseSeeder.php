<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
               RolesTableSeeder::class,
               ContactTableSeeder::class,
                ActorsTableSeeder::class,
               UsersTableSeeder::class,
                ImagesTableSeeder::class,
               YearsTableSeeder::class,
               MoviesTableSeeder::class,
               ContactTableSeeder::class,
               MoviesCategoriesTableSeeder::class,
               MoviesActorsTableSeeder::class
        ]);
    }
}
