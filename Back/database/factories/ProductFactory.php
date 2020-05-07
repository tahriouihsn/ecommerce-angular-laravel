<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 10),
        // 'category_id' => factory(App\Category::class),
        'category_id' => $faker->numberBetween(1, 10),
        'name' => $faker->name,
        'description' => $faker->text(),
        'price' => $faker->randomDigit
    ];
});
