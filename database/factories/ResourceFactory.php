<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resource;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {

    $name  = $faker->sentence(3, true);
    return [
        'title' => $faker->$name,
        'description' => $faker->paragraph(),
        'menu_title' => $faker->sentence(3, true), //new name/menu title
        'alias' => Str::slug($name, '-'),
        'content' => $faker->paragraphs(4, true),
        'type' => 1,
        'template' => 1,
        'created_at' => now()->toDateTimeString(),
        'published_at' => now()->toDateTimeString()
    ];
});
