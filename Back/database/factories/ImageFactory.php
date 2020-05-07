<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'product_id' => $faker->numberBetween(1, 20),
        'path' => 'https://e-coopera.com/ecoopera2/ecoopera2/public/storage/products/BlQb3c2027bcL7TtYXBXeGIpyV4KY6Rr2whMiCV0.jpeg',
    ];
});
