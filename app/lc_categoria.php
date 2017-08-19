<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lc_categoria extends Model
{
    /* campos que pueden ser modificados en la base de datos */
    protected $fillable = ['titulo','slug'];

    /* Devuelve la lista de posts de una categoria */
    public function posts()
    {
        return $this->hasMany(lc_post::class,'categoria_id');
    }
    /* Utilizamos el slug para filtrar por categoria, recibiendo el slug por la url */
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
