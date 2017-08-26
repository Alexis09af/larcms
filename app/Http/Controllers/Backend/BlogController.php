<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\http\Requests;
use App\lc_post;
use Intervention\Image\Facades\Image;


class BlogController extends BackendController
{

    //Guardamos la ruta para subir imagenes
    protected $uploadPath;



    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

    /**
     * Encargado de mostrar las publicaciones para su edición
     *
     */
    public function index(Request $request)
    {
        $onlyTrashed = FALSE;


        if(($status = $request->get('status')) && $status =='papelera'){

            $postsTotales = lc_post::onlyTrashed()->count();
            $posts = lc_post::onlyTrashed()->with('categoria','autor')->latest()->paginate($this->publicacionesPorPagina);
            $onlyTrashed = TRUE;
        }
        else if($status == 'propios'){
            $postsTotales = $request->user()->posts->count();
            $posts = $request->user()->posts()->with('categoria','autor')->latest()->paginate($this->publicacionesPorPagina);
        }
        else{
            $postsTotales = lc_post::count();
            $posts = lc_post::with('categoria','autor')->latest()->paginate($this->publicacionesPorPagina);

        }
        return view("backend.blog.index",compact('posts','postsTotales','onlyTrashed'));
    }

    /**
     * Cuando queremos crear una publicación, nos redigirá a la vista para crear la publicación
     * y utilizara el modelo lc_post.
     */
    public function create(lc_post $post)
    {
        return view('backend.blog.create',compact('post'));
    }

    /**
     * Despues de utilizar la funcion create, si queremos realizar la validación para crear la publicación se utilizará este metodo
     * @param Requests\PostRequest $request Encargado de validar que los datos de una publicación son correctos antes de guardarla.
     */
    public function store(Requests\PostRequest $request)
    {

        //La validación se ejecuta en app/http/requests/PostRequest.php

        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido creada correctamente!');
    }

    /*
     * Encargado de manejar la request para almacenar correctamente la imagen como su thumbnail
     */
    private function handleRequest($request){
        $data = $request->all();

        if($request->hasFile('image')){
            $image = $request->file('image');
            $fileName = $image->getClientOriginalName();

            $destination = $this->uploadPath;

            $successUploaded = $image->move($destination, $fileName);

            if($successUploaded){

                $width = config('cms.image.thumbnail.width');
                $height = config('cms.image.thumbnail.height');

                $extension = $image->getClientOriginalExtension();
                $thumbnail = str_replace(".{$extension}","_thumb.{$extension}", $fileName);

                Image::make($destination . '/' . $fileName)
                    ->resize($width,$height)
                    ->save($destination . '/' .$thumbnail);
            }

            $data['image'] = $fileName;
        }
        return $data;
    }



    /**
     * Muestra la vista para editar una publicación ya creada
     *
     * @param  int  $id Identificador de la publicación
     */
    public function edit($id)
    {
        $post = lc_post::findOrFail($id);
        return view("backend.blog.edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request Encargado de validar que los datos de una publicación son correctos antes de actualizarla.
     * @param  int  $id Identificador de la publicación
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = lc_post::findOrFail($id);
        $data = $this->handleRequest($request);
        $post->update($data);
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido editada correctamente!');
    }

    /**
     * Envia a la papelera una publicación
     *
     * @param  int  $id Identificador de la publicación
     */
    public function destroy($id)
    {
        lc_post::findOrFail($id)->delete();
        return redirect(route('backend.blog.index'))->with('enviado-papelera',['La publicación ha sido enviada a la papelera!',$id]);
    }

    /**
     * Devuelve de la papelera una publicación
     *
     * @param  int  $id Identificador de la publicación
     */
    public function restore($id)
    {
        $post = lc_post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido restaurada correctamente.');
    }

    /**
     * Eliminamos completamente una publicación
     *
     * @param  int  $id Identificador de la publicación
     */
    public function forceDestroy($id)
    {
        $post = lc_post::withTrashed()->findOrFail($id)->forceDelete();

        //Cuando borramos una publicación, eliminamos la imagen del servidor.
        if ( ! empty($post->image) )
        {
            $imagePath     = $this->uploadPath . '/' . $post->image;
            $ext           = substr(strrchr($post->image, '.'), 1);
            $thumbnail     = str_replace(".{$ext}", "_thumb.{$ext}", $post->image);
            $thumbnailPath = $this->uploadPath . '/' . $thumbnail;

            if ( file_exists($imagePath) ) unlink($imagePath);
            if ( file_exists($thumbnailPath) ) unlink($thumbnailPath);
        }

        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido eliminada correctamente.');
    }

    public function show($id){}

}
