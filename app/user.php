<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use GrahamCampbell\Markdown\Facades\Markdown;
use Laratrust\Traits\LaratrustUserTrait; //Laratrust Para roles

class user extends Authenticatable
{

    use LaratrustUserTrait;
    /*Campos que pueden ser modificados en la base de datos*/
    protected $fillable = [
        'nombre', 'email', 'password','slug','biografia'
    ];

    /*Elementos protegidos que no pueden ser mostrados*/
    protected $hidden = [
        'password', 'remember_token',
    ];

    /* Devuelve la lista de posts de un usuario.*/
    public function posts()
    {
        return $this->hasMany(lc_post::class,'autor_id');

    }


    /*Devuelve la imagen utilizada en la web gravatar de un usuario*/
    public function gravatar(){
        $email = $this->email;
        $default = asset("http://icons.iconarchive.com/icons/graphicloads/flat-finance/256/person-icon.png");
        $size = 40;

        return "https://www.gravatar.com/avatar/" . md5( strtolower( trim( $email ) ) ) . "?d=" . urlencode( $default ) . "&s=" . $size;

    }

    /* Utilizamos el slug para filtrar por usuario, recibiendo el slug por la url */
    public function getRouteKeyName(){
        return 'slug';
    }

    /* Devuelve la información biográfica de un usuario, tratada correctamente con el markdown */
    public function getBiografiaHtmlAttribute($value) {
        return $this->biografia ? Markdown::convertToHtml(e($this->biografia)) : NULL;
    }

    /*Encripta la contraseña para ser almacenada */
    public function setPasswordAttribute($value)
    {
        if (!empty($value)) $this->attributes['password'] = bcrypt($value);
    }
}
