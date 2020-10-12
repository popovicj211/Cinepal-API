<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Slides;
use Faker\Generator as Faker;

$factory->define(Slides::class, function (Faker $faker) {
    return [
        'img_id' => rand(1,2),
         'header' => $faker->title,
         'text' => $faker->text,
        'created_at' => now()
    ];
});
