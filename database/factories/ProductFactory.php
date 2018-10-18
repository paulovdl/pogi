<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->word(10),
        'price' => $faker->randomNumber(4),
        'quantity' => $faker->randomNumber(2),
        'size' => $faker->word(10),
        'code' => $faker->unique()->numberBetween($min = 1000, $max = 9999)
    ];
});
