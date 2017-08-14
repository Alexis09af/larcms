<?php
namespace App\Views\Composers;

use Illuminate\View\View;
use App\lc_categoria;
use App\lc_post;

class NavigationComposer {

    public function compose(View $view){
        $this->composeCategorias($view);
        $this->composePopulares($view);
        $this->composeArchives($view);
    }

    private function composeCategorias(View $view){

        $categorias = lc_categoria::with(['posts' => function($query){
            $query->publicado();
        }])->orderBy('titulo','asc')->get();

        $view->with('categorias',$categorias);
    }

    private function composePopulares(View $view){

        $postsPopulares = lc_post::publicado()->popular()->take(3)->get();
        $view->with('postsPopulares',$postsPopulares);
    }

    private function composeArchives(View $view){

        $archives = lc_post::selectRaw('count(id) as post_count, year(published_at) year, monthname(published_at) month')
            ->publicado()
            ->groupBy('year','month')
            ->orderByRaw('min(published_at) desc')
            ->get();
        $view->with('archives', $archives);
    }
}