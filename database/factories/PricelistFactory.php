<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Pricelists;
use Faker\Generator as Faker;
use App\Models\Movies;
use App\Models\Categories;
$factory->define(Pricelists::class, function (Faker $faker) {
    return [
        'movie_id' =>  Movies::all()->random()->id,
        'cat_id' => Categories::all()->random()->id,
         'price' =>  rand(4.00, 15.00),
        'created_at' => now()
    ];
});
