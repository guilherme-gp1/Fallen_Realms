<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function cadastro_usuario (Request $request){
        return view('cadastro_usuario');
    }
}
