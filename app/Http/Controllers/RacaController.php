<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Raca;

class RacaController extends Controller
{
    public function cadastro_raca_html(Request $request)
    {
        return view('Criacao_de_Raca');
    }

    public function cadastro_raca_post(Request $request)
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

        $raca = new Raca();

        if ($raca->where('nome', "=", $request->nome)->exists()) {
            return response()->json(['erro' => 's', 'mensagem' => 'Raça já cadastrada'], 200);
        }

        try {
            $raca->nome = $request->nome;
            $raca->descricao = $request->descricao;
            $raca->vida_base = $request->vida_base;
            $raca->bonus_forca = $request->bonus_forca;
            $raca->bonus_vigor = $request->bonus_vigor;
            $raca->bonus_agilidade = $request->bonus_agilidade;
            $raca->bonus_magia = $request->bonus_magia;
            $raca->bonus_inteligencia = $request->bonus_inteligencia;
            $raca->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar raça: ' . $e->getMessage()], 500);
        }
    }
}
