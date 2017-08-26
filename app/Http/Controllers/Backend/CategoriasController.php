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
     * Muestra la lista de categorías.
     */
    public function index()
    {

        $categorias      = lc_categoria::with('posts')->orderBy('titulo')->paginate($this->categoriasPorPagina);
        $totalCategorias = lc_categoria::count();

        return view("backend.categorias.index", compact('categorias', 'totalCategorias'));
    }

    /**
    * Muestra el formulario para crear una nueva categoría
     */
    public function create()
    {
        $categoria = new lc_categoria();
        return view("backend.categorias.create", compact('categoria'));
    }

    /**
     * Función para almacenar una nueva categoria
     *
     * @param  \Illuminate\Http\Request  $request Encargado de validar que los datos de una categoría son correctos antes de crearla.
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\CategoriaStoreRequest $request)
    {
        lc_categoria::create($request->all());

        return redirect("/backend/categorias")->with("mensaje", "La categoría ha sido creada correctamente!");
    }


    /**
     * Muestra el formulario para editar una categoria.
     * @param  int  $id Identificador de la categoría
     */
    public function edit($id)
    {
        $categoria = lc_categoria::findOrFail($id);

        return view("backend.categorias.edit", compact('categoria'));
    }

    /**
     * Actualiza una categoria
     *
     * @param  \Illuminate\Http\Request  $request Encargado de validar que los datos de una categoría son correctos antes de actualizarla.
     * @param  int  $id Identificador de la categoría
     */
    public function update(Requests\CategoriaUpdateRequest $request, $id)
    {
        lc_categoria::findOrFail($id)->update($request->all());

        return redirect("/backend/categorias")->with("mensaje", "Categoría actualizada correctamente!");
    }
    /**
     * Elimina la categoria y actualiza a la categoría por defecto las publicaciones de la categoría eliminada.
     * @param  int  $id Identificador de la categoría.
     */
    public function destroy(Requests\CategoriaDestroyRequest $request, $id)
    {
        //Cuando borramos una categoría, todos las publicaciones que tenian esa categoría, cambian su categoría a la categoría por defecto.
        lc_post::withTrashed()->where('categoria_id', $id)->update(['categoria_id' => config('cms.default_categoria_id')]);

        $categoria = lc_categoria::findOrFail($id);
        $categoria->delete();


        return redirect("/backend/categorias")->with("mensaje", "Categoría eliminada correctamente!");
    }



    public function show($id){}


}
