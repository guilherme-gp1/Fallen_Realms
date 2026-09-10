<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Habilidade;
use App\Models\Classe;

class HabilidadeController extends Controller
{
    public function cadastro_habilidade_html(Request $request)
    {
        return view('Criacao_de_Habilidades');
    }

    public function cadastro_habilidade_post(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
            'tipo' => 'required|string|max:255',
            'valor' => 'required|integer',
            'custo' => 'required|integer',
            'cooldown' => 'required|integer',
        ]);

        $habilidade = new Habilidade();

        if ($habilidade->where('nome', "=", $request->nome)->exists()) {
            return response()->json(['erro' => 's', 'mensagem' => 'Habilidade já cadastrada'], 200);
        }

        try {
            $habilidade->nome = $request->nome;
            $habilidade->descricao = $request->descricao;
            $habilidade->tipo = $request->tipo;
            $habilidade->valor = $request->valor;
            $habilidade->custo = $request->custo;
            $habilidade->cooldown = $request->cooldown;
            $habilidade->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar habilidade: ' . $e->getMessage()], 500);
        }
    }

   
}
