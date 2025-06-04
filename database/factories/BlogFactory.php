<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Blog;
use App\Tematica;
use Faker\Generator as Faker;

$factory->define(Blog::class, function (Faker $faker) {
    return [
        'titulo' => $faker->word,
        'descripcion' => $faker->paragraph,
        'portada' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
        'link_whatsapp' => 'https://wa.me/' . $faker->numerify('##########'),
        'link_facebook' => 'https://facebook.com/' . $faker->userName, 
        'link_instagram' => 'https://instagram.com/' . $faker->userName,
        'tematica_id' => Tematica::inRandomOrder()->first()->id,
    ];
});
