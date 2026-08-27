<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/cadastro_usuario', [UsuarioController::class, 'cadastro_usuario']);