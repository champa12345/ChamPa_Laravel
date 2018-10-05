<?php
$factory->define(App\Product::class, function ($faker) {
    return [
        'name' => $faker->name,
        'category_id' => function () {
            return factory(App\Category::class)
            ->create()->id;
        },
        'description' => $faker->word,
        'price' => rand(25000, 40000),
        'promotion_price' => rand(25000, 40000),
        'unit' => $faker->word,
        'status' => rand(0,1),
        'image' => $faker->image('public/image'),   
    ];
});