<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


//las clases que extiendan la clase backendController son para autenticados
class BackendController extends Controller
{

    protected $publicacionesPorPagina = 5;
    protected $categoriasPorPagina = 15;
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
