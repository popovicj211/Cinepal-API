<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Reservation;
use App\Models\User;
use App\Models\Movies;
use App\Models\Pricelists;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        'user_id' => User::all()->random()->id,
         'movie_id' => Movies::all()->random()->id,
          'qtypersons' => rand(1,4) ,
           'totalprice' => rand(20.00, 50.00),
           'datefrom' => now(),
            'dateto' => $faker->dateTimeBetween('now' , '+90days'),
             'created_at' => now()
    ];
});
