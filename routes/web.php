<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('Home');
})->name('home.index');

Route::get('/login', [UsuarioController::class, "create"])->name('login.create');
Route::get('/login/store', [UsuarioController::class, "store"])->name('login.store');
