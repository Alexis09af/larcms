<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lc_redesSociales extends Model
{
    protected $fillable = ['fbLink','fbCheck','twtLink','twtCheck','gpLink','gpChecl','instaLink','instaCheck'];

    public function redes()
    {
        return $this;
    }
}
