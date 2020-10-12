<?php

use Illuminate\Database\Seeder;
use App\Models\MoviesCategories;
class MoviesCategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
                  factory(MoviesCategories::class , 22)->create();
    }
}
