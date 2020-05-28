<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    $categories = ['Infantil', 'Adulto', 'Masculino', 'Feminino'];
    return [
        'name' => $faker->name(),
        'description' => $faker->colorName(),
        'quantity' => $faker->numberBetween(100, 400),
        'category' => $categories[$faker->numberBetween(0, 3)],
        'amount' => $faker->numberBetween(1,1000)
    ];
});