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

Route::get('/', function () {
    return view('dashboard');
});

// Trabajar con CRUD mediante Laravel y VueJS, generalmente no requieren de vistas de formulario renderizadas por el servidor. 
Route::resource('tasks', 'TaskController', ['except' => ['show', 'create', 'edit']]);