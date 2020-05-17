<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Actors;
$factory->define(Actors::class, function (Faker $faker) {
    return [
          'name' => $faker->name,
           'created_at' => now()
    ];
});
