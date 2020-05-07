<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\PhoneNumber;
use Faker\Generator as Faker;

$factory->define(PhoneNumber::class, function (Faker $faker) {
    return [
        //
        "user_id" => $faker->numberBetween(1, 10),
        "value" => $faker->phoneNumber,
    ];
});
