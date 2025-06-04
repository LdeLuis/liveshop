<?php

use App\Elemento;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ElementosSeeder extends Seeder
{
    public function run()
    {
        factory(Elemento::class, 4)->create();
    }
}


