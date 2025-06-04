<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador - Brincolines Bambinos (Renta)',
            'email' => 'admin@wozial.com',
            'password' => Hash::make('wozial'), 
            'role_as' => 1, // Asignar un rol, por ejemplo 1 para admin, 0 para user
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Michael Eduardo Sandoval Pérez',
            'email' => 'mikeed1998@gmail.com',
            'password' => Hash::make('wozial'), 
            'role_as' => 0,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
