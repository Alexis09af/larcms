<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\lc_categoria;
use App\lc_post;


class CategoriasController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $categorias      = lc_categoria::with('posts')->orderBy('titulo')->paginate($this->categoriasPorPagina);
        $totalCategorias = lc_categoria::count();

        return view("backend.categorias.index", compact('categorias', 'totalCategorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categoria = new lc_categoria();
        return view("backend.categorias.create", compact('categoria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoriaStoreRequest $request)
    {
        lc_categoria::create($request->all());

        return redirect("/backend/categorias")->with("mensaje", "La categoría ha sido creada correctamente!");
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
        $categoria = lc_categoria::findOrFail($id);

        return view("backend.categorias.edit", compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\CategoriaUpdateRequest $request, $id)
    {
        lc_categoria::findOrFail($id)->update($request->all());

        return redirect("/backend/categorias")->with("mensaje", "Categoría actualizada correctamente!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\CategoriaDestroyRequest $request, $id)
    {
        //Cuando borramos una categoría, todos las publicaciones que tenian esa categoría, cambian su categoría a la categoría por defecto.
        lc_post::withTrashed()->where('categoria_id', $id)->update(['categoria_id' => config('cms.default_categoria_id')]);

        $categoria = lc_categoria::findOrFail($id);
        $categoria->delete();


        return redirect("/backend/categorias")->with("mensaje", "Categoría eliminada correctamente!");
    }
}
