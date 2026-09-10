<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PersonagemController;
use App\Http\Controllers\HabilidadeController;
use App\Http\Controllers\TecnicaController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\Classe_HabilidadeController;

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
Route::get('/criar_habilidade', [HabilidadeController::class, 'cadastro_habilidade_html']);
Route::get('/criar_tecnica', [TecnicaController::class, 'cadastro_tecnica_html']);
Route::get('/criar_classe', [ClassesController::class, 'cadastro_classe_html']);
Route::get('/criar_raca', [RacaController::class, 'cadastro_raca_html']);
Route::get('/puxar_habilidade', [Classe_HabilidadeController::class, 'cadastro_classe_habilidade_html']);
Route::get('/login', [LoginController::class, 'login_usuario_html']);
