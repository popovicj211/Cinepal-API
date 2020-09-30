<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Seat;
use Faker\Generator as Faker;
use App\Models\Reservation;
use App\Models\SeatChecker;
$factory->define(Seat::class, function (Faker $faker) {
    return [
          'number' => SeatChecker::all()->where('free' , '=',0)->unique()->random()->seat,
           're_id' => Reservation::all()->random()->id ,
            'created_at' => now()
    ];
});
