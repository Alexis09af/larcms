<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lc_categoria extends Model
{
    public function posts()
    {
        return $this->hasMany(lc_post::class,'categoria_id');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }

}
