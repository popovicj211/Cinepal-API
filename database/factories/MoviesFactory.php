<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Movies;
use App\Models\Year;
use App\Models\Images;
$factory->define(Movies::class, function (Faker $faker) {
    return [
         'name' => $faker->word ,
          'description' => $faker->text,
          'release_date' => $faker->dateTimeThisYear,
           'running_time' => rand(100, 160),
            'year_id' => Year::all()->random()->id,
            'img_id' => Images::all()->where('id' , '>' , 2)->random()->id,
            'created_at' => now()
    ];
});
