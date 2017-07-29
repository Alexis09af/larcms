<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;

class user extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /*
     * Devuelve la lista de posts de un usuario.
     */
    public function posts()
    {
        return $this->hasMany(lc_post::class,'autor_id');

    }

    public function gravatar(){
        $email = $this->email;
        $default = asset("https://upload.wikimedia.org/wikipedia/commons/thumb/1/12/User_icon_2.svg/2000px-User_icon_2.svg.png");
        $size = 40;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

    }
    public function getRouteKeyName(){
        return 'slug';
    }

    public function getBiografiaHtmlAttribute($value) {
        return $this->biografia ? Markdown::convertToHtml(e($this->biografia)) : NULL;
    }

}
