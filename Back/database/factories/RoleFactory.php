<?php

/* @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role as AppRole;
use Bitfumes\Multiauth\Model\Role;
// use App; 
$factory->define(AppRole::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement(['User', 'Seller', 'Admin']),
    ];
});
