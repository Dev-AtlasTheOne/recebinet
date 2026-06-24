<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Home');
})->name('home.index');

Route::get('/login', [UsuarioController::class, "enter"])->name('user.enter');
Route::get('/login/authenticate', [UsuarioController::class, "authenticate"])->name('user.authenticate');
Route::post('/registro', [UsuarioController::class, "create"])->name('user.create');
Route::post('/registro/store', [UsuarioController::class, "store"])->name('user.store');
