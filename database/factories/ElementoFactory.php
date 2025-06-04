<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Seccion;
use App\Elemento;
use Faker\Generator as Faker;

$factory->define(Elemento::class, function (Faker $faker) {
    return [
        'elemento' => $faker->word,
        'texto' => $faker->word,
        'imagen' => '',
        'url' => '',
        'contenido' => 0,
        'activo' => 1,
        'orden' => '666',
        'seccion' => Seccion::inRandomOrder()->first()->id
    ];
});
