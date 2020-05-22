<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\File;
use Faker\Generator as Faker;

$factory->define(File::class, function (Faker $faker) {
    return [
        'file' => $faker->randomElement(['photo1.png', 'photo3.jpg', 'photo4.jpg']),
        'post_id' => $faker->numberBetween(1, 1000),
    ];
});
