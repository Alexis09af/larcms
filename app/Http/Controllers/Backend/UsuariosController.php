<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\user;


class UsuariosController extends BackendController
{
    /**
     * Muestra la lista de usuarios
     */
    public function index()
    {
        $usuarios      = user::orderBy('nombre')->paginate($this->usuariosPorPagina);
        $totalUsuarios = user::count();

        return view("backend.usuarios.index", compact('usuarios', 'totalUsuarios'));
    }

    /**
     * Muestra el formulario para crear un usuario.
     */
    public function create()
    {
        $usuario = new user();
        return view("backend.usuarios.create", compact('usuario'));
    }

    /**
     * Guarda un nuevo usuario
     * @param  \Illuminate\Http\Request  $request Encargado de validar que los datos de un usuario son correctos antes de crearlo.
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


    public function show($id){}

    /**
     * Muestra el formulario de para editar un usuario
     *
     * @param  int  $id Identificador del usuario
     */
    public function edit($id)
    {
        $usuario = user::findOrFail($id);

        return view("backend.usuarios.edit", compact('usuario'));


    }

    /**
     * Actualiza el usuario
     *
     * @param  \Illuminate\Http\Request  $request  Encargado de validar que los datos de un usuario son correctos antes de actualizarlo.
     * @param  int  $id Identificador del usuario
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
     * Elimina un usuario
     *
     * @param  int  $id Identificador del usuario
     *  @param  \Illuminate\Http\Request  $request  Valida que no se pueda eliminar el usuario principal.
     */
    public function destroy(Requests\UsuarioDestroyRequest $request, $id)
    {

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
