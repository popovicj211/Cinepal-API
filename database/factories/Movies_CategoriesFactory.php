<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\MoviesCategories;
use App\Models\Movies;
use App\Models\Categories;
$factory->define(MoviesCategories::class, function (Faker $faker) {
    return [
       /* 'movie_id' => rand(1,6),
        'category_id' => rand(3,13),
        'created_at' => now()*/
        'movie_id' =>  Movies::all()->random()->id,
        'category_id' => Categories::all()->random()->id,
        'created_at' => now()
    ];
});
