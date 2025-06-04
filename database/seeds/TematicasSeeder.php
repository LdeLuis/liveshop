<?php

use App\Tematica;
use Illuminate\Database\Seeder;

class TematicasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Tematica::class, 5)->create();
    }
}
