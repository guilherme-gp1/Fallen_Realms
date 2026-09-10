<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;

class PersonagemController extends Controller
{
    public function cadastro_personagem_html(Request $request){
        return view('criacao_de_personagem');
    }

    public function cadastro_personagem(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'raca_id' => 'required|integer',
            'classe_id' => 'required|integer',
            'forca' => 'required|integer',
            'vigor' => 'required|integer',
            'agilidade' => 'required|integer',
            'magia' => 'required|integer',
            'inteligencia' => 'required|integer',
        ]);
    }
}
