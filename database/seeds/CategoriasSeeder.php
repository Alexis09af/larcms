<?php

use Illuminate\Database\Seeder;

class CategoriasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lc_categorias')->truncate();
        DB::table('lc_categorias')->insert([

            [
                'titulo' => 'Sin Categoría',
                'slug' => 'sin-categoria'
            ],
            [
                'titulo' => 'Diseño Web',
                'slug' => 'diseno-web'
            ],
            [
                'titulo' => 'Posicionamiento SEO',
                'slug' => 'posicionamiento-seo'
            ],
            [
                'titulo' => 'Fotografia',
                'slug' => 'fotografia'
            ],
        ]);

    }
}
