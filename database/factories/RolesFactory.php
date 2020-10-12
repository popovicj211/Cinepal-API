<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Role;
$factory->define(Role::class, function (Faker $faker) {
    return [
         'name' => $faker->name,
        'created_at' => now()
    ];
});
