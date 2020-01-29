<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tv;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Tv::class, function (Faker $faker) {
    return [
        'name' => Str::slug($faker->text(10), '-'),
        'caption' => $faker->text(20),
        'description' => $faker->text(50),
        'type_id' => 1, 3
    ];
});
