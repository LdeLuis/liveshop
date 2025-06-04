<?php

use App\CatalogoCaracteristicas;
use Illuminate\Database\Seeder;

class CatalogoCaracteristicaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(CatalogoCaracteristicas::class, 300)->create();
    }
}
