<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Adress;
use Faker\Generator as Faker;

$factory->define(Adress::class, function (Faker $faker) {
    return [
        //

        "user_id" => $faker->numberBetween(1, 10),
        "value" => $faker->address,
    ];
});
