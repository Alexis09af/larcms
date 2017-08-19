<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lc_redesSociales extends Model
{
    /*Campos que pueden ser modificados en la base de datos*/
    protected $fillable = ['fbLink','fbCheck','twtLink','twtCheck','gpLink','gpChecl','instaLink','instaCheck'];

    /*Devuelve un objeto con las redes sociales */
    public function redes()
    {
        return $this;
    }
}
