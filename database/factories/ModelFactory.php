<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'price' => $faker->randomFloat(2, $min = 150, $max = 500),
        'description' => $faker->sentence,
        'image' => $faker->imageUrl($width = 640, $height = 480),
        'rating_cache' => $faker->randomDigit,
        'rating_count' => $faker->randomDigit,
    ];
});

