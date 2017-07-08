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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    // Get a random user
    $user = \App\User::inRandomOrder()->first();
    

    // generate fake data for post
    return [
        'user_id' => $user->id,
        'link_id' => $faker->numberBetween(1, 10),
        'title' => $faker->sentence,
        'body' => $faker->text,
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    // Get a random user
    $user = \App\User::inRandomOrder()->first();
    

    // generate fake data for post
    return [
        'name' => $faker->sentence,
    ];
});

$factory->define(App\Link::class, function (Faker\Generator $faker) {
    // Get a random user

    // generate fake data for post
    return [
        'category_id' =>  $faker->numberBetween(1, 10),
        'url' => $faker->url,
        'cover' => $faker->imageUrl($width = 640, $height = 480),
        'title' => $faker->sentence,
        'description' => $faker->text,
        'short_url' => $faker->url,
    ];
});
