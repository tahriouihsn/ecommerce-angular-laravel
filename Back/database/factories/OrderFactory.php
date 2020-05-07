<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Order;
use Faker\Generator as Faker;

$factory->define(Order::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 50),
        // 'product_id' => $faker->numberBetween(1, 50),
        // 'total' => $faker->numberBetween(100, 500),

        'delivered_at' => null

    ];
});
