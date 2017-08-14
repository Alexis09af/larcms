<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use GrahamCampbell\Markdown\Facades\Markdown;



class lc_post extends Model
{
    use SoftDeletes;
    protected $fillable = ['titulo','slug','categoria_id','excerpt','body','published_at','image'];
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

    public function fechaFormatoES($showTimes = false){
        $format = "d-m-Y";
        if($showTimes) $format = $format . "H:i:s";
        return ($this->published_at) ? $this->published_at->format($format) : 'd-m-Y';
    }


    public function setBoolPublicadoAttribute($value){
        $this->attributes['published_at'] = $value ?: NULL;
    }
    public function publicationLabel()
    {
        if ( ! $this->published_at) {
            return '<span class="label label-warning">Despublicado</span>';
        }
        elseif ($this->published_at && $this->published_at->isFuture()) {
            return '<span class="label label-info">Pendiente</span>';
        }
        else {
            return '<span class="label label-success">Publicado</span>';
        }
    }

    //Devuelve la imagen de un post
    public function getImageUrlAttribute($value)
    {
        $imageUrl = "";
        if ( ! is_null($this->image))
        {
            $dir = config('cms.image.directory');
            $imagePath = public_path() . "/{$dir}/" . $this->image;
            if (file_exists($imagePath)) $imageUrl = asset("{$dir}/" . $this->image);
        }
        return $imageUrl;
    }

    //Devuelve la imagen thumbnail de un post
    public function getImageThumbUrlAttribute($value)
    {
        $imageUrl = "";
        if ( ! is_null($this->image))
        {
            $dir = config('cms.image.directory');
            $ext = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$ext}", "_thumb.{$ext}", $this->image);
            $imagePath = public_path() . "/{$dir}/" . $thumbnail;
            if (file_exists($imagePath)) $imageUrl = asset("{$dir}/" . $thumbnail);
        }
        return $imageUrl;
    }

    public function getBodyHtmlAttribute($value) {
        return $this->body ? Markdown::convertToHtml(e($this->body)) : NULL;
    }
    public function getExcerptHtmlAttribute($value) {
        return $this->excerpt ? Markdown::convertToHtml(e($this->excerpt)) : NULL;
    }

    public function scopeFilter($query, $filter)
    {
        if (isset($filter['month']) && $month = $filter['month']) {
            $query->whereRaw('month(published_at) = ?', [Carbon::parse($month)->month]);
        }

        if (isset($filter['year']) && $year = $filter['year']) {
            $query->whereRaw('year(published_at) = ?', [$year]);
        }

        //Si hay parametro
        if (isset($filter['search']) && $search = $filter['search'])
        {
            $query->where(function($q) use ($search) {
                 $q->whereHas('autor', function($qr) use ($search) {
                     $qr->where('nombre', 'LIKE', "%{$search}%");
                });
                 $q->orWhereHas('categoria', function($qr) use ($search) {
                     $qr->where('titulo', 'LIKE', "%{$search}%");
                 });
                $q->orWhere('titulo', 'LIKE', "%{$search}%");
                $q->orWhere('slug', 'LIKE', "%{$search}%");
                $q->orWhere('excerpt', 'LIKE', "%{$search}%");
                $q->orWhere('body', 'LIKE', "%{$search}%");
            });
        }
    }
    


}
