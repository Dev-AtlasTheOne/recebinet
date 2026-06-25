<?php

use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home.index');

Route::get('/login', [UsuarioController::class, 'enter'])->name('user.enter');

Route::post('/login/authenticate', [UsuarioController::class, 'authenticate'])->name('user.authenticate');

Route::get('/login/logout', [UsuarioController::class, 'exit'])->name('user.exit');

Route::get('/registro', [UsuarioController::class, 'create'])->name('user.create');

Route::post('/registro/store', [UsuarioController::class, 'store'])->name('user.store');
