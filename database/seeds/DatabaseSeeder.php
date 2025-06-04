<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(ConfiguracionsSeeder::class);
        $this->call(PoliticasSeeder::class);
        $this->call(FAQSSeeder::class);
        $this->call(SeccionsSeeder::class);
        $this->call(ElementosSeeder::class);
        $this->call(SliderPrincipalsSeeder::class);
        $this->call(CategoriaSeeder::class);
        $this->call(TallaSeeder::class);
        $this->call(CatalogoSeeder::class);
        $this->call(CatalogoCaracteristicaSeeder::class);
        $this->call(CatalogoGaleriaSeeder::class);
        $this->call(TematicasSeeder::class);
        $this->call(BlogsSeeder::class);
    }
}
