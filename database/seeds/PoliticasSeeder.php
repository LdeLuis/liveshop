<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PoliticasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('politicas')->insert([
            'titulo' => 'Aviso de Privacidad',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos officiis quia deleniti. A perspiciatis nostrum rerum distinctio, nihil officia ullam, laborum optio cumque accusantium error adipisci possimus ad libero molestias?',
            'archivo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('politicas')->insert([
            'titulo' => 'Métodos de Pago',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos officiis quia deleniti. A perspiciatis nostrum rerum distinctio, nihil officia ullam, laborum optio cumque accusantium error adipisci possimus ad libero molestias?',
            'archivo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('politicas')->insert([
            'titulo' => 'Devoluciones',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos officiis quia deleniti. A perspiciatis nostrum rerum distinctio, nihil officia ullam, laborum optio cumque accusantium error adipisci possimus ad libero molestias?',
            'archivo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('politicas')->insert([
            'titulo' => 'Términos y Condiciones',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos officiis quia deleniti. A perspiciatis nostrum rerum distinctio, nihil officia ullam, laborum optio cumque accusantium error adipisci possimus ad libero molestias?',
            'archivo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('politicas')->insert([
            'titulo' => 'Garantías',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos officiis quia deleniti. A perspiciatis nostrum rerum distinctio, nihil officia ullam, laborum optio cumque accusantium error adipisci possimus ad libero molestias?',
            'archivo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('politicas')->insert([
            'titulo' => 'Políticas de Envío',
            'descripcion' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos officiis quia deleniti. A perspiciatis nostrum rerum distinctio, nihil officia ullam, laborum optio cumque accusantium error adipisci possimus ad libero molestias?',
            'archivo' => '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
