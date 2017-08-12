<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*
| Ruta del índice del frontend, muestra la lista de posts.
*/
Route::get('/', [
    'uses' => 'BlogController@index',
    'as' => 'blog',
]);

/*
| Ruta de un post
*/
Route::get('/blog/{post}',[
    'uses' => 'BlogController@muestraPost',
    'as' => 'muestraPost'
]);


Route::get('/categoria/{categoria}',[
    'uses' => 'BlogController@categoria',
    'as' => 'categoria'
]);

Route::get('/autor/{autor}',[
    'uses' => 'BlogController@autor',
    'as' => 'autor'
]);

Auth::routes();

Route::get('/admin', 'Backend\HomeController@index')->name('admin');


Route::get('/editar-perfil', 'Backend\HomeController@edit');
Route::put('/editar-perfil', 'Backend\HomeController@update');



Route::get('logout', 'Auth\LoginController@logout');


Route::resource('/backend/blog','Backend\BlogController',['as' => 'backend']);

Route::put('/backend/blog/restore/{blog}',[
    'uses' => 'Backend\BlogController@restore',
    'as' => 'backend.blog.restore'
]);

Route::delete('/backend/blog/force-destroy/{blog}',[
    'uses' => 'Backend\BlogController@forceDestroy',
    'as' => 'backend.blog.force-destroy'
]);


Route::resource('/backend/categorias','Backend\CategoriasController',['as' => 'backend']);

Route::resource('/backend/usuarios','Backend\UsuariosController',['as' => 'backend']);


Route::get('/backend/usuarios/confirmar/{users}', [
    'uses' => 'Backend\UsuariosController@confirm',
    'as' => 'backend.usuarios.confirmar'
]);