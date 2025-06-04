<?php

use App\Talla;
use Illuminate\Database\Seeder;

class TallaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Talla::count() == 0) {
            Talla::create(['talla' => 'Chico']);
            Talla::create(['talla' => 'Mediano']);
            Talla::create(['talla' => 'Grande']);
        }
    }
}
