<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        'product_id' => $faker->numberBetween(1, 10),
        'comment' => $faker->sentence(),
        'rate' => $faker->numberBetween(0, 5),
    ];
});
