<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tecnica;

class TecnicaController extends Controller
{
    public function cadastro_tecnica_html(Request $request){
        return view('Criacao_de_Tecnica');
    }

    public function cadastro_tecnica_post(Request $request){
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
            'tipo' => 'required|string|max:255',
            'dano' => 'required|integer',
            'custo' => 'required|integer',
            'cooldown' => 'required|integer',
            'nivel_minimo' => 'required|integer',
        ]);

        $tecnica = new Tecnica();

        if ($tecnica->where('nome', "=", $request->nome)->exists()) {
            return response()->json(['erro' => 's', 'mensagem' => 'Técnica já cadastrada'], 200);
        }

        try {
            $tecnica->nome = $request->nome;
            $tecnica->descricao = $request->descricao;
            $tecnica->tipo = $request->tipo;
            $tecnica->dano = $request->dano;
            $tecnica->custo = $request->custo;
            $tecnica->cooldown = $request->cooldown;
            $tecnica->nivel_minimo = $request->nivel_minimo;
            $tecnica->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar técnica: ' . $e->getMessage()], 500);
        }
    }
}
