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

        DB::table('users')->delete();

        // Generamos el usuario inicial
        DB::table('users')->insert(
            [
                [
                    'nombre' => 'Administrador',
                    'slug' => 'administrador',
                    'email' => 'admin@admin.com',
                    'password' => bcrypt('admin'),
                    'biografia' => 'Laravel!!'
                ],
            ]
        );
    }
}
