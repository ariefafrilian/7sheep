<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'statement' => $faker->realText(),
        'live' => $faker->numberBetween(0, 100),
        'evil' => $faker->numberBetween(0, 100),
        'user_id' => $faker->numberBetween(1, 100),
    ];
});
