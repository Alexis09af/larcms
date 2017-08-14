<?php

namespace App\Http\Controllers;

use App\lc_categoria;
use App\lc_post;
use App\user;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    //Controla la cantidad de posts que se muestran por página.
    protected $totalPostsPagina = 10;

    //Función que controla como se mostraran los posts en el blog
    public function index()
    {
        //ordenFecha es un scope que se gestiona des de BlogController, y escogemos $totalPostPagina post por página.
        $posts = lc_post::with('autor')
            ->ordenFecha()
            ->publicado();

        //Comprobar si recibe una instrucción de busqueda
        if($search = request('search')){


            $posts->where(function($query) use ($search){
               $query->whereHas('autor', function($query2) use($search) {
                   $query2->where('nombre','LIKE',"%{$search}%");
                });
                $query->orWhereHas('categoria', function($query2) use($search) {
                    $query2->where('titulo','LIKE',"%{$search}%");
                });
            });

            $posts = $posts->orWhere('titulo','LIKE',"%{$search}%");
            $posts = $posts->orWhere('slug','LIKE',"%{$search}%");
            $posts = $posts->orWhere('excerpt','LIKE',"%{$search}%");
            $posts = $posts->orWhere('body','LIKE',"%{$search}%");


        }

        $posts = $posts->paginate($this->totalPostsPagina);
        return view("frontend.index", compact('posts'));
    }



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

    public function muestraPost(lc_post $post){

        // por cada visita a la publicacion tenemos que actualizar el total de visitas al post
        $post->increment('contador_visitas');
        return view("frontend.post.post", compact('post'));
    }
}
