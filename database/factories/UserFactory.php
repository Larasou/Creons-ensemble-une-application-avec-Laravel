<?php

use App\Traits\SeedsTrait;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {

    return [
        'title' => $faker->title,
        'rank' => 2,
        'name' => $faker->unique()->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        'avatar' => array_random(SeedsTrait::$avatarSVG),
        'remember_token' => str_random(60),
    ];
});


$factory->define(App\Profile::class, function (Faker $faker) {
    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'age' => rand(13, 100),
    ];
});

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'color' => array_random(SeedsTrait::$color),
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'name' => $faker->text(25),
        'body' => $faker->text(900),
        'image' => array_random(SeedsTrait::$avatar),
    ];
});

$factory->define(App\Tutorial::class, function (Faker $faker) {
    return [
        'name' => $faker->text(25),
        'body' => $faker->text(900),
    ];
});

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'body' => $faker->sentence,
    ];
});
