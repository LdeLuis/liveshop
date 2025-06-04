<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Catalogo;
use App\Categoria;
use App\Talla;
use Faker\Generator as Faker;

$factory->define(Catalogo::class, function (Faker $faker) {
    return [
        'nombre' => $faker->word,
        'portada' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        'largo' => $faker->randomFloat(2, 1, 100),
        'ancho' => $faker->randomFloat(2, 1, 100),
        'alto' => $faker->randomFloat(2, 1, 100),
        'categoria_id' => Categoria::inRandomOrder()->first()->id,
        'talla_id' => Talla::inRandomOrder()->first()->id,
    ];
});
