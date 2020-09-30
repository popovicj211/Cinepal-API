<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use Faker\Generator as Faker;
use App\Models\SeatChecker;

$factory->define(SeatChecker::class, function (Faker $faker) {
    return [
          'seat' => $faker->unique()->randomNumber() ,
           'free' => rand(0,1),
           'created_at' => now()
    ];
});
