<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\OrderProduct;
use Faker\Generator as Faker;

$factory->define(OrderProduct::class, function (Faker $faker) {
    return [
        'product_id' => $faker->unique()->numberBetween(1, 50),
        // 'seller_id' => $faker->numberBetween(1, 50),
        'order_id' => $faker->unique()->numberBetween(1, 50),

    ];
});
