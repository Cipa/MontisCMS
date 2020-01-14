<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resource;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {

    $name  = $faker->sentence(3, true);
    return [
        'title' => $name,
        'description' => $faker->paragraph(),
        //'menu_title' => $name,
        'alias' => Str::slug($name, '-'),
        'content' => $faker->paragraphs(4, true),
        'type_id' => 1,
        'template_id' => 0,
        'created_at' => now()->toDateTimeString(),
        'published_at' => now()->toDateTimeString()
    ];
});
