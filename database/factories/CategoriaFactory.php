<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Categoria;
use Faker\Generator as Faker;

$factory->define(Categoria::class, function (Faker $faker) {
    return [
        'categoria' => $this->faker->word,
        'portada' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        'color' => $this->faker->safeHexColor,
        'activo' => 1,
    ];
});
