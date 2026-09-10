<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonagemController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/menu_principal', function () {
    return view('menu_principal');
});

Route::get('/criar_personagem', function () {
    return view('criacao_de_personagem');
});


Route::get('/cadastro_usuario', [UsuarioController::class, 'cadastro_usuario_html']);
Route::get('/criar_personagem', [PersonagemController::class, 'cadastro_personagem_html']);
Route::get('/login', [LoginController::class, 'login_usuario_html']);
