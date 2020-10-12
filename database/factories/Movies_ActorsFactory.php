<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\MoviesActors;
use App\Models\Movies;
use App\Models\Actors;
$factory->define(MoviesActors::class, function (Faker $faker) {
    return [
          /* 'movie_id' => rand(1,7),
            'actor_id' => rand(1,25),
            'created_at' => now()*/
        'movie_id' => Movies::all()->random()->id,
        'actor_id' => Actors::all()->random()->id,
        'created_at' => now()
    ];
});
