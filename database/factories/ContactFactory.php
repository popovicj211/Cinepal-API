<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;
use App\Models\Contact;
$factory->define(Contact::class, function (Faker $faker) {
    return [
               'name' => $faker->name,
                'email' => $faker->email,
                 'subject' => $faker->title,
                 'message' => $faker->paragraph ,
                 'created_at' => now()
    ];
});
