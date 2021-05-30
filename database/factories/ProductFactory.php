<?php

use Faker\Generator as Faker;


$factory->define(App\Product::class, function (Faker $faker) {
    $menImages = scandir(public_path('images/hommes'));
    $womenImages = scandir(public_path('images/femmes'));
    unset($womenImages[0]);
    unset($womenImages[1]);
    unset($menImages[0]);
    unset($menImages[1]);
    shuffle($womenImages);
    shuffle($menImages);
    $category = $this->faker->numberBetween($min = 1, $max = 2);
    if($category === 1){
        $fakerImage = $menImages[0];
    }else{
        $fakerImage = $womenImages[0];
    }
    return [
        'name' => $faker->word,
        'description' => $faker->text($maxNbChars = 200),  
        'reference' => $faker->text($maxNbChars = 10), 
        'active' => $faker->numberBetween($min = 0, $max = 1),
        'category_id' => $category,
        'image' => $fakerImage,
        'price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 10.00, $max = 70.00), 
        'status' => $faker->randomElement(['standard', 'sale']),
        'size' => 'XS'
    ];
});
