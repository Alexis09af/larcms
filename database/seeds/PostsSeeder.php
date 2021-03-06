<?php

use Faker\Factory;
use Carbon\carbon;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Resetea la tabla posts
        DB::table('lc_posts')->delete();

        DB::table('lc_posts')->insert([

            [
                'autor_id' => 1,
                'titulo' => 'Primera publicación',
                'excerpt' => 'Bienvenido a larCMS',
                'body' => 'Accede al administrador para gestionar publicaciones',
                'slug' => 'primera-publicacion',
                'image' => "primera_publicacion.jpg",
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
                'published_at' => Carbon::now(),
                'categoria_id' => 1,
                'contador_visitas' => 0
            ],

        ]);

        /*
        //inicializa la tabla con 36 post
        $posts = [];
        $image = "";
        $faker = Factory::create(); //Api para crear palabras y frases aleatorias en latin.
        //$fecha = Carbon::create(2017,7,15,9); //Api que hereda de DateTime
        $fecha = Carbon::now()->modify('-1 year'); //Api que hereda de DateTime

        for ($i=1; $i<=36; $i++){
            $fecha->addDays(10);
            $fechaPublicacion = clone($fecha);
            $fechaCreacion = clone($fecha);
            $image = "Post_Image_".rand(1,5).".jpg";
            $posts[]=[
                'autor_id' => rand(1,3),
                'titulo' => $faker->sentence(rand(8,12)),
                'excerpt' => $faker->text(rand(250,300)),
                'body' => $faker->paragraphs(rand(10,15),true),
                'slug' => $faker->slug(),
                'image' => rand(0,1) == 0 ? '' : $image,
                'created_at' => $fechaCreacion,
                'updated_at' => $fechaCreacion,
                'published_at' => $i <30 ? $fechaPublicacion : (rand(0,1)==0 ? NULL : $fechaPublicacion->addDays(4)),
                'categoria_id' => rand(2,4),
                'contador_visitas' => rand(1,100)


            ];
        }


        DB::table('lc_posts')->insert($posts);
        */

    }
}
