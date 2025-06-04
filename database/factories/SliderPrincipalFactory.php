<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\SliderPrincipal;
use Faker\Generator as Faker;

$factory->define(SliderPrincipal::class, function (Faker $faker) {
    return [
        'imagen' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
    ];
});
