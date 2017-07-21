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
