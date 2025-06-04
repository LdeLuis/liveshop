<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Catalogo;
use App\CatalogoGaleria;
use Faker\Generator as Faker;

$factory->define(CatalogoGaleria::class, function (Faker $faker) {
    return [
        'imagen' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        'catalogo_id' => Catalogo::inRandomOrder()->first()->id
    ];
});
