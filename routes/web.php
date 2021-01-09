<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function(){
    Route::namespace('App\Http\Controllers')->group(function(){
        Route::resource('categorias', 'CategoriaController');
        Route::resource('tarefas', 'TarefaController');
    });
});
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
