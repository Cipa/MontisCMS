<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Resource;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Resource::class, function (Faker $faker) {

    $name  = $faker->sentence(3, true);
    return [
        'name' => $name,
        'alias' => Str::slug($name, '-'),
        'content' => $faker->paragraphs(4, true),
        'created_at' => now()->toDateTimeString(),
        'published_at' => now()->toDateTimeString()
    ];
});
