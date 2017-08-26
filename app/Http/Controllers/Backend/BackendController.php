<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


//Controller principal del backend, de él extienden (BlogController, CategoriasController, HomeController, RedesSocialesController, UsuariosController
class BackendController extends Controller
{

    //Cuantas publicaciones se ven por página de edición
    protected $publicacionesPorPagina = 10;

    //Cuantas categorias se ven por página de edición
    protected $categoriasPorPagina = 15;

    //Cuantos usuarios se ven por página de edición
    protected $usuariosPorPagina = 15;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('check-permissions');
    }
}
