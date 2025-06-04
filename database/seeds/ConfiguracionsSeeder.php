<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConfiguracionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('configuracions')->insert([
            'titulo' => 'Brincolines Bambinos - Renta',
            'descripcion' => 'Renta de brincolines',
            'destinatario' => 'michaelwozial@gmail.com',
            'destinatario2' => 'michaelwozial@outlook.com',
            'remitente' => 'testeolocal@proyectoswozial.com',
            'remitentepass' => 'D(]$I6s7)vBV',
            'remitentehost' => 'mail.proyectoswozial.com',
            'remitenteport' => '465',
            'remitenteseguridad' => 'ssl',
            'telefono' => '3322332233',
            'whatsapp' => '3322332233',
            'whatsapp2' => '3322332233',
            'facebook' => 'facebook.com/miempresa',
            'instagram' => 'instagram.com/miempresa',
            'youtube' => 'youtube.com/miempresa',
            'linkedin' => 'linkedin.com/company/miempresa',
            'envio' => 'Envío estándar',
            'envioglobal' => 'Envío global',
            'iva' => '21',
            'incremento' => '10',
            'mapa' => '<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3733.6745427148135!2d-103.39920042561187!3d20.642118580912236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1ses-419!2smx!4v1719427426099!5m2!1ses-419!2smx" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>',
            'direccion' => 'Av. Lapizlazuli 2074, 44560 Guadalajara, Jal.',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
