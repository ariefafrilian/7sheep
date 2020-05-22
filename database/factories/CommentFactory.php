<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'comment' => $faker->realText(),
        'live' => $faker->numberBetween(0, 100),
        'evil' => $faker->numberBetween(0, 100),
        'post_id' => $faker->numberBetween(1, 1000),
        'user_id' => $faker->numberBetween(1, 100),
    ];
});
