<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem;
use App\Models\Classe;
use App\Models\Classe_Habilidade;
use App\Models\Raca;
use App\Models\Habilidade;

class PersonagemController extends Controller
{
    public function cadastro_personagem_html(Request $request)
    {

        $classes = Classe::all();
        $racas = Raca::all();


        $data = [
            'classes' => $classes,
            'racas' => $racas
        ];

        return view('Criacao_de_Personagem', $data);
    }

    public function puxar_habilidades_classe(Request $request)
    {
        $habilidades = Habilidade::whereIn(
            'id',
            Classe_Habilidade::where('classe_id', $request->classe_id)
                ->pluck('habilidade_id')
        )->get();

        return response()->json($habilidades);
    }
}
