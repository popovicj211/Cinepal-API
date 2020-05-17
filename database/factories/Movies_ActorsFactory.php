<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\MoviesActors;
$factory->define(MoviesActors::class, function (Faker $faker) {
    return [
           'movie_id' => rand(1,6),
            'actor_id' => rand(1,12),
            'created_at' => now()
    ];
});
