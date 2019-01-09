<?php

use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
    'product' => $faker->sentence(4),
        'slug' => $faker->slug,
        'price' => $faker->numberBetween(100,20000),
        'category_id' => '13',
        'image' => '/uploads/product/1547010989Xiaomi-Mi-Backpack-Classic-Business-Backpacks-17L-Capacity-Students-Laptop-Bag-Men-Women-Bags-For-15.jpg_640x640.jpg',
        'description'=> $faker->paragraph(4)
    ];
});
