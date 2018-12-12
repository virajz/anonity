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
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Story::class, function (Faker\Generator $faker) {
    $title = $faker->sentence;
    return [
        'user_id' => 1,
        'genre_id' => 1,
        'title' => $title,
        'slug' => str_slug($title),
        'body' => $faker->text(3000),
        'approved' => 0,
    ];
});
