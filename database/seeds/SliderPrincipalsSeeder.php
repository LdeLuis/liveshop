<?php

use App\SliderPrincipal;
use Illuminate\Database\Seeder;

class SliderPrincipalsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(SliderPrincipal::class, 10)->create();
    }
}
