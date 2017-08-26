<?php

namespace App\Http\Controllers;

use App\lc_categoria;
use App\lc_post;
use App\lc_redesSociales;
use App\user;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Controla la cantidad de posts que se muestran por página.
    protected $totalPostsPagina = 10;


    //Función que controla como se mostraran los posts en el blog
    public function index()
    {

         //dd(request()->only((['month'])));
        //ordenFecha es un scope que se gestiona desde BlogController, y escogemos $totalPostPagina post por página.
        $posts = lc_post::with('autor')
            ->ordenFecha()
            ->publicado()
            ->filter(request()->only(['search', 'year', 'month']))
            ->paginate($this->totalPostsPagina);



        return view("frontend.index", compact('posts'));
    }



    //Filtra las publicaciones por categoria
    public function categoria(lc_categoria $categoria)
    {
        $categoriaNombre = $categoria->titulo;


        //Route Model Binding
        $posts = $categoria
            ->posts()
            ->with('autor')
            ->latest()
            ->publicado()
            ->paginate($this->totalPostsPagina);


        return view("frontend.index", compact('posts','categoriaNombre'));

    }


    //Filtra las publicaciones por autor
    public function autor(user $autor)
    {
        $autorNombre = $autor->nombre;


        //Route Model Binding
        $posts = $autor
            ->posts()
            ->with('categoria')
            ->latest()
            ->publicado()
            ->paginate($this->totalPostsPagina);



        return view("frontend.index", compact('posts','autorNombre'));
    }

    //Se encarga de incrementar las visitas a una publicación y de mostrarla.
    public function muestraPost(lc_post $post){

        // por cada visita a la publicacion tenemos que actualizar el total de visitas al post
        $post->increment('contador_visitas');


        return view("frontend.post.post", compact('post'));
    }
}
