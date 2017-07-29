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
    public function index()
    {
        $postsTotales = lc_post::count();


        $posts = lc_post::with('categoria','autor')->latest()->paginate($this->publicacionesPorPagina);
        return view("backend.blog.index",compact('posts','postsTotales'));
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
        return redirect(route('backend.blog.index'))->with('creado','La publicación ha sido creada correctamente!');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
