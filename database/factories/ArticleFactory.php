<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Article;
use App\User;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Article::class, function (Faker $faker) {
    return [
        'title' => $faker->word(5, true),
        'content' => $faker->sentences(10, true),
        'user_id' => User::inRandomOrder()->first()->id
    ];
});
