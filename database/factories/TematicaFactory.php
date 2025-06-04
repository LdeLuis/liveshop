<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Tematica;
use Faker\Generator as Faker;

$factory->define(Tematica::class, function (Faker $faker) {
    return [
        'tematica' => $this->faker->word,
        'color' => $this->faker->safeHexColor,
    ];
});
