<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\http\Requests;
use App\lc_post;
use Intervention\Image\Facades\Image;


class BlogController extends BackendController
{

    protected $uploadPath;
    protected $publicacionesPorPagina = 5;


    public function __construct()
    {
        parent::__construct();
        $this->uploadPath = public_path(config('cms.image.directory'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if(($status = $request->get('status')) && $status =='papelera'){
            $postsTotales = lc_post::onlyTrashed()->count();
            $posts = lc_post::onlyTrashed()->with('categoria','autor')->latest()->paginate($this->publicacionesPorPagina);
            $onlyTrashed = TRUE;
        }
        else{
            $postsTotales = lc_post::count();
            $posts = lc_post::with('categoria','autor')->latest()->paginate($this->publicacionesPorPagina);
            $onlyTrashed = FALSE;
        }
        return view("backend.blog.index",compact('posts','postsTotales','onlyTrashed'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(lc_post $post)
    {
        return view('backend.blog.create',compact('post'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\PostRequest $request)
    {

        //La validación se ejecuta en app/http/requests/PostRequest.php

        $data = $this->handleRequest($request);
        $request->user()->posts()->create($data);
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido creada correctamente!');
    }

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = lc_post::findOrFail($id);
        return view("backend.blog.edit",compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\PostRequest $request, $id)
    {
        $post = lc_post::findOrFail($id);
        $data = $this->handleRequest($request);
        $post->update($data);
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido editada correctamente!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        lc_post::findOrFail($id)->delete();
        return redirect(route('backend.blog.index'))->with('enviado-papelera',['La publicación ha sido enviada a la papelera!',$id]);
    }

    public function restore($id)
    {
        $post = lc_post::withTrashed()->findOrFail($id);
        $post->restore();
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido restaurada correctamente.');
    }

    public function forceDestroy($id)
    {

        lc_post::withTrashed()->findOrFail($id)->forceDelete();
        return redirect(route('backend.blog.index'))->with('mensaje','La publicación ha sido eliminada correctamente.');

    }

}
