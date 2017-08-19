<?php
use App\lc_post;


/* $permission guardarà los permisos en formato CRUD
$controller nos controla la seccion a la que pertenecemos
por lo tanto si entramos en la seccion Users como administrador tendremos: $permission = crud, $controller = users
La versión que utilizaremos será. ej: crud-post
*/
function check_user_permissions($request, $actionName = NULL, $id = NULL)
{
    // Usuario actual
    $currentUser = $request->user();

    // Acción que realiza y sobre que, ej: Blog@edit
    if ($actionName) {
        $currentActionName = $actionName;
    }
    else {
        $currentActionName = $request->route()->getActionName();
    }

    //Con el explode separamos la accion en 2 campos, Lugar y Acción
    list($controller, $method) = explode('@', $currentActionName);
    $controller = str_replace(["App\\Http\\Controllers\\Backend\\", "Controller"], "", $controller);

    $crudPermissionsMap = [
        'crud' => ['create', 'store', 'edit', 'update', 'destroy', 'restore', 'forceDestroy', 'index', 'view']
    ];

    $classesMap = [
        'Blog'       => 'post',
        'Usuarios'      => 'user',
        'Categorias' => 'category',
        'Redes' => 'redes',
    ];


    $return = true;
    foreach ($crudPermissionsMap as $permission => $methods)
    {
        //Revisamos los permisos
        if (in_array($method, $methods) && isset($classesMap[$controller]))
        {
            //$className = post, user o category
            $className = $classesMap[$controller];


            if ($className == 'post' && in_array($method, ['edit', 'update', 'destroy', 'restore', 'forceDestroy']))
            {
                $id = !is_null($id) ? $id : $request->route('blog');

                //Revisamos que si el usuario actual es autor, solo pueda modificar sus publicaciones
                //Autor no tiene los permisos update-others-post ni delete-others-post
                if ( $id &&
                    (!$currentUser->can('update-others-post') || !$currentUser->can('delete-others-post')) )
                {
                    $post = lc_post::withTrashed()->find($id);
                    if ($post->author_id !== $currentUser->id) {
                        return false;
                    }
                }
            }
            //Si el usuario no tiene permisos, no hace falta continuar con el request
            elseif ( ! $currentUser->can("{$permission}-{$className}")) {
                return false;
            }

            break;
        }
    }

    return true;
}
