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
Route::get('/', function () {
    return view('frontend.index');
});

/*
| Ruta de un post
*/
Route::get('/blog/post', function () {
    return view('frontend..post.post');
});

