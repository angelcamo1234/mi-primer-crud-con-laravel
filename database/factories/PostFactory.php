<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'titulo' => $faker->sentence(20),
        'contenido' => $faker->paragraph(100),
        'user_id' => User::all(['id'])->random()
    ];
});
