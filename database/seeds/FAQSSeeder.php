<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FAQSSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void 
     */
    public function run()
    {
        DB::table('faqs')->insert([
            'pregunta' => 'Pregunta 1',
            'respuesta' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ab deserunt sint eum sequi fugiat similique id. Delectus eligendi necessitatibus, molestiae quos, unde natus excepturi tempora pariatur architecto, doloremque perferendis?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'pregunta' => 'Pregunta 2',
            'respuesta' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ab deserunt sint eum sequi fugiat similique id. Delectus eligendi necessitatibus, molestiae quos, unde natus excepturi tempora pariatur architecto, doloremque perferendis?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'pregunta' => 'Pregunta 3',
            'respuesta' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ab deserunt sint eum sequi fugiat similique id. Delectus eligendi necessitatibus, molestiae quos, unde natus excepturi tempora pariatur architecto, doloremque perferendis?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'pregunta' => 'Pregunta 4',
            'respuesta' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ab deserunt sint eum sequi fugiat similique id. Delectus eligendi necessitatibus, molestiae quos, unde natus excepturi tempora pariatur architecto, doloremque perferendis?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'pregunta' => 'Pregunta 5',
            'respuesta' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ab deserunt sint eum sequi fugiat similique id. Delectus eligendi necessitatibus, molestiae quos, unde natus excepturi tempora pariatur architecto, doloremque perferendis?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('faqs')->insert([
            'pregunta' => 'Pregunta 6',
            'respuesta' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse ab deserunt sint eum sequi fugiat similique id. Delectus eligendi necessitatibus, molestiae quos, unde natus excepturi tempora pariatur architecto, doloremque perferendis?',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
