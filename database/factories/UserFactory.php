<?php

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
    $rand = rand(0, 7);
    $avatar = [
        '/images/avatar/daniel.jpg',
        '/images/avatar/helen.jpg',
        '/images/avatar/elliot.jpg',
        '/images/avatar/elyse.png',
        '/images/avatar/jenny.jpg',
        '/images/avatar/steve.jpg',
        '/images/avatar/stevie.jpg',
        '/images/avatar/veronika.jpg'
    ];
    return [
        'title' => $faker->title,
        'name' => $faker->unique()->firstName,
        'email' => $faker->unique()->safeEmail,
        'password' => 'secret',
        'avatar' => $avatar[$rand],
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
    $rand = rand(0, 5);
    $color = [
      'blue', 'red', 'olive', 'orange', 'violet', 'purple'
    ];
    return [
        'name' => $faker->word,
        'description' => $faker->sentence,
        'color' => $color[$rand],
    ];
});

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'name' => $faker->text(25),
        'body' => $faker->text(900),
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
