<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SeccionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('seccions')->insert([
            'seccion' => 'configuracion',
            'portada' => 'bi bi-gear-fill',
            'slug' => 'configuracion',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'politicas',
            'portada' => 'bi bi-shield-fill-exclamation',
            'slug' => 'politicas',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'faqs',
            'portada' => 'bi bi-question-circle-fill',
            'slug' => 'faqs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'home',
            'portada' => 'bi bi-house-door-fill',
            'slug' => 'home',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'nosotros',
            'portada' => 'bi bi-postcard-fill',
            'slug' => 'nosotros',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'contacto',
            'portada' => 'bi bi-send-fill',
            'slug' => 'contacto',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'catalogo',
            'portada' => 'bi bi-stack',
            'slug' => 'catalogo',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'sliders',
            'portada' => 'bi bi-card-image',
            'slug' => 'sliders',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('seccions')->insert([
            'seccion' => 'blogs',
            'portada' => 'bi bi-building-fill',
            'slug' => 'blogs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
