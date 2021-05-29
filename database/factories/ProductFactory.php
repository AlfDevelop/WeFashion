<?php

use Faker\Generator as Faker;

use Illuminate\Http\File;

$factory->define(App\Product::class, function (Faker $faker) {
    $images = scandir(public_path('images/hommes'));
    unset($images[0]);
    unset($images[1]);
    shuffle($images);
    return [
        'name' => $faker->word,
        'description' => $faker->text($maxNbChars = 200),  
        'reference' => $faker->text($maxNbChars = 10), 
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'category_id' => $faker->numberBetween($min = 1, $max = 2),
        'image' => $images[0],
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10.00, $max = 70.00), 
        'status' => $faker->randomElement(['new', 'sale']),
        'size' => 'XS'
    ];
});
