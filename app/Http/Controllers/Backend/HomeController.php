<?php

namespace App\Http\Controllers\Backend;

use App\http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends BackendController
{


    /**
     * Muestra la página principal del backend
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.home.index');
    }

    //Encargado de llamar la vista de modificación del usuario actual
    public function edit()
    {
        $usuario = Auth::user();

        return view('backend.home.edit',compact('usuario'));

    }


    /**
     * Cuando modificamos los datos del usuario actual, la funcion update recibe un request con los datos para cambiar, y nos redirige a la pagina principal.
     * @param  \Illuminate\Http\Request  $request Encargado de validar que los datos de un usuario son correctos antes de actualizarlo.
     */
    public function update(Requests\perfilUpdateRequest $request)
    {
        $usuario = Auth::user();
        $usuario->update($request->all());

        return redirect()->back()->with("mensaje", "El perfil ha sido actualizado!");
    }
}
