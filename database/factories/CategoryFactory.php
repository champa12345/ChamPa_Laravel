<?php

use Faker\Generator as Faker;
$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->word,
        'image' => $faker->image('public/image'),
    ];
});