<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;

class PersonagemController extends Controller
{
    public function cadastro_personagem_html(Request $request){
        return view('criacao_de_personagem');
    }
}
