<?php

use App\CatalogoGaleria;
use Illuminate\Database\Seeder;

class CatalogoGaleriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CatalogoGaleria::class, 200)->create();
    }
}
