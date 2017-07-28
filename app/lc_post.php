<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;


class lc_post extends Model
{

    protected $dates = ['published_at'];

    //Devuelve a que usuario pertenece el post.
    public function autor(){
        return $this->belongsTo(user::class);
    }

    //Devuelve la categoria a la que pertenece el post
    public function categoria(){
        return $this->belongsTo(lc_categoria::class);
    }

    //Devuelve la fecha de un post en formato adecuado.
    public function getFechaPublicacionAttribute(){
        return is_null($this->published_at) ? '' : $this->published_at->diffForHumans();
    }


    //Devuelve la query de los posts ordenada por fecha.
    public function scopeOrdenFecha($query){
        //El scope nos permite tratar querys para un modelo.
        return $query->orderBy('created_at','asc');
    }


    public function scopePublicado($query){
        $now = Carbon::now();
        return $query->where('published_at', '<=' ,$now);
    }

    public function scopePopular($query){
        return $query->orderBy('contador_visitas', 'desc');

    }

    //Devuelve la imagen de un post
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        if ( ! is_null($this->image))
        {
            $imagePath = public_path() . "/img/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("img/" . $this->image);
        }
        return $imageUrl;
    }

    //Devuelve la imagen thumbnail de un post
    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";
        if ( ! is_null($this->image))
        {
            $ext = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/img/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("img/" . $thumbnail);
        }
        return $imageUrl;
    }

    public function getBodyHtmlAttribute($value) {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }
    public function getExcerptHtmlAttribute($value) {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }




}
