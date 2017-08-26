<?php

namespace App\Http\Controllers\Backend;

use App\lc_redesSociales;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RedesSocialesController extends BackendController
{
    /**
     * Muestra las Redes sociales
     */
    public function index()
    {
        $redes = lc_redesSociales::all()->first();
        return view("backend.redesSociales.index",compact('redes'));
    }


    /**
     * Modifica las redes sociales
     *
     * @param  \Illuminate\Http\Request  $request Encargado de validar que los datos de las redes sociales son correctos antes de crearlos.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $redes = lc_redesSociales::findOrFail($id);
        $redes->update($request->all());

        return redirect(route("backend.redes-sociales.index"))->with("mensaje", "Redes sociales actualizadas correctamente!");
    }


    public function create(){}
    public function store(Request $request){}
    public function show($id){}
    public function edit($id){}
    public function destroy($id){}
}
