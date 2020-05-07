<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cooperative;
use Faker\Generator as Faker;

$factory->define(Cooperative::class, function (Faker $faker) {
    return [
        //

        "name" => $faker->name,
        "matricule" => $faker->sentence,
        "is_deleted" => 0
    ];
});
