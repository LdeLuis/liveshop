<?php

use Illuminate\Database\Seeder;
use App\Categoria;
use Faker\Factory as Faker;

class CategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();

        // foreach(range(1, 10) as $index) {
        //     Categoria::create([
        //         'categoria' => $faker->word,
        //         'portada' => $faker->imageUrl(640, 480, 'cats', true, 'faker'),
        //         'color' => $faker->safeHexColor,
        //     ]);
        // }

        factory(Categoria::class, 6)->create();
    }
}
