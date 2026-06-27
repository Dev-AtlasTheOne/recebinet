<?php

use App\Http\Controllers\PdfController;
use App\Http\Controllers\UsuarioController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('Home');
})->name('home.index');

Route::get('/login', [UsuarioController::class, 'enter'])->name('login');

Route::post('/login/authenticate', [UsuarioController::class, 'authenticate'])->name('user.authenticate');

Route::get('/login/logout', [UsuarioController::class, 'exit'])->name('user.exit');

Route::get('/registro', [UsuarioController::class, 'create'])->name('user.create');

Route::post('/registro/store', [UsuarioController::class, 'store'])->name('user.store');

Route::get('/workstation', [PdfController::class, 'index'])->name('workstation.index')->middleware('auth');

Route::post('/workstation/pdf/store', [PdfController::class, 'store'])->name('pdf.store')->middleware('auth');

Route::post('/pdf/{pdf}/receive', [PdfController::class, 'receive'])->name('pdf.receive')->middleware('auth');

Route::post('/pdf/{pdf}/view', [PdfController::class, 'view'])->name('pdf.view')->middleware('auth');

Route::delete('/pdf/{pdf}/delete', [PdfController::class, 'destroy'])->name('pdf.destroy')->middleware('auth');

Route::get('/pdf/list', [PdfController::class, 'list'])->name('pdf.list')->middleware('auth');
