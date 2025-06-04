<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Catalogo;
use App\CatalogoCaracteristicas;
use Faker\Generator as Faker;

$factory->define(CatalogoCaracteristicas::class, function (Faker $faker) {
    return [
        'caracteristica' => $faker->word,
        'catalogo_id' => Catalogo::inRandomOrder()->first()->id
    ];
});
