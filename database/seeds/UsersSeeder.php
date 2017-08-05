<?php

use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reseteamos la tabla de usuarios

        DB::table('users')->truncate();

        // Generamos el usuario inicial
        DB::table('users')->insert(
            [
                [
                    'nombre' => 'Alexis',
                    'slug' => 'alexis',
                    'email' => 'Alexis@udg.com',
                    'password' => bcrypt('alexis'),
                    'biografia' => 'Aficionado a la fotografia'
                ],
                [
                    'nombre' => 'Antonio Modera',
                    'slug' => 'antonio',
                    'email' => 'Antonio@udg.com',
                    'password' => bcrypt('antonio'),
                    'biografia' => 'Alegre'
                ],
                [
                    'nombre' => 'Paco Edita',
                    'slug' => 'paco',
                    'email' => 'paco@udg.com',
                    'password' => bcrypt('paco'),
                    'biografia' => 'feliz'
                ]
            ]
        );
    }
}
