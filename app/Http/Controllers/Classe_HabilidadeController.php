<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe_Habilidade;

class Classe_HabilidadeController extends Controller
{
    public function cadastro_classe_habilidade_html(Request $request){
        return view('Criacao_de_Classe_Habilidade');
    }

    public function cadastro_classe_habilidade_post(Request $request){
        $request->validate([
            'classe_id' => 'required|integer',
            'habilidade_id' => 'required|integer',
        ]);

        $classe_habilidade = new Classe_Habilidade();

        if($classe_habilidade->where('classe_id', "=", $request->classe_id)
            ->where('habilidade_id', "=", $request->habilidade_id)
            ->exists()){
            return response()->json(['erro' => 's', 'mensagem' => 'Essa habilidade já está cadastrada para essa classe'], 200);
        }

        try {
            $classe_habilidade->classe_id = $request->classe_id;
            $classe_habilidade->habilidade_id = $request->habilidade_id;
            $classe_habilidade->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar habilidade para a classe: ' . $e->getMessage()], 500);
        }
    }
}
