<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;


class UsuariosController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $usuarios      = user::orderBy('nombre')->paginate($this->usuariosPorPagina);
        $totalUsuarios = user::count();

        return view("backend.usuarios.index", compact('usuarios', 'totalUsuarios'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $usuario = new user();
        return view("backend.usuarios.create", compact('usuario'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\UsuarioStoreRequest $request)
    {

        //Hasheamos el password al crear el usuario.
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);


        $usuario = user::create($data);
        $usuario->attachRole($request->role);
        return redirect("/backend/usuarios")->with("mensaje", "El usuario ha sido creada correctamente!");
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
        $usuario = user::findOrFail($id);

        return view("backend.usuarios.edit", compact('usuario'));


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\UsuarioUpdateRequest $request, $id)
    {
       // $usuario = user::findOrFail($id)->update($request->all());
        $usuario = user::findOrFail($id);
        $usuario->update($request->all());

        $usuario->detachRoles();
        $usuario->attachRole($request->role);
        return redirect("/backend/usuarios")->with("mensaje", "Usuario actualizado correctamente!");
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Requests\UsuarioDestroyRequest $request, $id)
    {

        /* @todo eliminar imagenes de los posts creados del servidor. */

        $usuario = User::findOrFail($id);

        $deleteOption = $request->delete_option;
        $selectedUser = $request->selected_user;

        if ($deleteOption == "delete") {
            // Ejecutamos esta opción si se ha escogido borrar todas las publicaciones.
            $usuario->posts()->withTrashed()->forceDelete();
        }
        elseif ($deleteOption == "attribute") {
            $usuario->posts()->update(['autor_id' => $selectedUser]);
        }

        $usuario->delete();

        return redirect("/backend/usuarios")->with("mensaje", "Usuario eliminado correctamente!");
    }

    public function confirm(Requests\UsuarioDestroyRequest $request, $id)
    {
        $usuario = user::findOrFail($id);

        //Escogemos todos los usuarios menos el actual, por si queremos migrar las publicaciones al eliminar el usuario.
        $usuarios = user::where('id', '!=', $usuario->id)->pluck('nombre', 'id');

        return view("backend.usuarios.confirmar", compact('usuario', 'usuarios'));
    }
}
