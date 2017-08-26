<?php
namespace App\Views\Composers;

use App\lc_redesSociales;
use Illuminate\View\View;
use App\lc_categoria;
use App\lc_post;

class redesSocialesComposer {

    public function compose(View $view){

        $this->composeRedes($view);
    }


    private function composeRedes(View $view){
        $redes=lc_redesSociales::first();
        $view->with('redes', $redes);
    }
}