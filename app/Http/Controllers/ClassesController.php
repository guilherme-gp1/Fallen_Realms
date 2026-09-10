<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Classe;

class ClassesController extends Controller
{
    public function cadastro_classe_html(Request $request)
    {
        return view('Criacao_de_Classe');
    }

    public function cadastro_classe_post(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'required|string|max:1000',
            'vida_base' => 'required|integer',
            'bonus_forca' => 'required|integer',
            'bonus_vigor' => 'required|integer',
            'bonus_agilidade' => 'required|integer',
            'bonus_magia' => 'required|integer',
            'bonus_inteligencia' => 'required|integer',
        ]);

        $classe = new Classe();

        if ($classe->where('nome', "=", $request->nome)->exists()) {
            return response()->json(['erro' => 's', 'mensagem' => 'Classe já cadastrada'], 200);
        }

        try {
            $classe->nome = $request->nome;
            $classe->descricao = $request->descricao;
            $classe->vida_base = $request->vida_base;
            $classe->bonus_forca = $request->bonus_forca;
            $classe->bonus_vigor = $request->bonus_vigor;
            $classe->bonus_agilidade = $request->bonus_agilidade;
            $classe->bonus_magia = $request->bonus_magia;
            $classe->bonus_inteligencia = $request->bonus_inteligencia;
            $classe->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar classe: ' . $e->getMessage()], 500);
        }
    }

    public function puxar_classe_get(Request $request)
    {
        $classes = Classe::all();

        $data = [
            'classes' => $classes
        ];

        return view('Criacao_de_Classe_Habilidade', $data);
    }
}
