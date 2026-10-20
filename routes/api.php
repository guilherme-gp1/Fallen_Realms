<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HabilidadeController;
use App\Http\Controllers\TecnicaController;
use App\Http\Controllers\ClassesController;
use App\Http\Controllers\RacaController;
use App\Http\Controllers\Classe_HabilidadeController;
use App\Http\Controllers\PersonagemController;
use App\Http\Controllers\Personagem_StatusController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/login', [LoginController::class, 'login_usuario_post']);
Route::post('/cadastro', [UsuarioController::class, 'cadastro_usuario_post']);
Route::post('/cadastro_habilidade', [HabilidadeController::class, 'cadastro_habilidade_post']);
Route::post('/cadastro_tecnica', [TecnicaController::class, 'cadastro_tecnica_post']);
Route::post('/cadastro_classe_habilidade', [Classe_HabilidadeController::class, 'cadastro_classe_habilidade_post']);
Route::post('/cadastro_classe', [ClassesController::class, 'cadastro_classe_post']);
Route::post('/cadastro_raca', [RacaController::class, 'cadastro_raca_post']);
Route::post('/cadastro_personagem_status', [Personagem_StatusController::class, 'cadastro_personagem_status']);
//Route::get('/habilidades_classe/{classe_id}', [Personagem_StatusController::class, 'puxar_habilidades_classe']);
