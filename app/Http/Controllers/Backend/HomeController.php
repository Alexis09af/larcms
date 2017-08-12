<?php

namespace App\Http\Controllers\Backend;

use App\http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends BackendController
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.home.index');
    }

    public function edit(Request $request)
    {
        $usuario = Auth::user();

        return view('backend.home.edit',compact('usuario'));

    }

    public function update(Requests\perfilUpdateRequest $request)
    {
        $usuario = Auth::user();
        $usuario->update($request->all());

        return redirect()->back()->with("mensaje", "El perfil ha sido actualizado!");
    }
}
