<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Talla;
use Faker\Generator as Faker;

$factory->define(Talla::class, function (Faker $faker) {
    return [
        'talla' => $faker->randomElement(['Chico', 'Mediano', 'Grande']),
    ];
});
