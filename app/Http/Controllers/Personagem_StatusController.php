<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personagem_Status;
use App\Models\Classe;
use App\Models\Raca;
use App\models\TokenUsuario;


class Personagem_StatusController extends Controller
{

    public function exibir_personagem_html(Request $request)
    {
        $classes = Classe::all();
        $racas = Raca::all();


        $data = [
            'classes' => $classes,
            'racas' => $racas,
        ];

        return view('Criacao_de_Personagem', $data);
    }

    public function criar_personagem_post(Request $request){
        $request->validate([
            'user_id' => 'required|integer',
            'nome' => 'required|string|max:255',
            'classe_id' => 'required|integer',
            'raca_id' => 'required|integer',
            'forca' => 'required|integer',
            'vigor' => 'required|integer',
            'agilidade' => 'required|integer',
            'magia' => 'required|integer',
            'inteligencia' => 'required|integer',
            'nivel' => 'required|integer',
            'experiencia' => 'required|integer',
            'vida_atual' => 'required|integer',
            'vida_maxima' => 'required|integer',
            'pontos' => 'required|integer',
        ]);

        $personagem = new Personagem_Status();

        if($personagem->where('nome', "=", $request->nome)->exists()){
            return response()->json(['erro' => 's', 'mensagem' => 'Personagem já cadastrado'], 200);
        }

        try {
            $personagem->user_id = $request->user_id;
            $personagem->nome = $request->nome;
            $personagem->classe_id = $request->classe_id;
            $personagem->raca_id = $request->raca_id;
            $personagem->forca = $request->forca;
            $personagem->vigor = $request->vigor;
            $personagem->agilidade = $request->agilidade;
            $personagem->magia = $request->magia;
            $personagem->inteligencia = $request->inteligencia;
            $personagem->nivel = $request->nivel;
            $personagem->experiencia = $request->experiencia;
            $personagem->vida_atual = $request->vida_atual;
            $personagem->vida_maxima = $request->vida_maxima;
            $personagem->pontos = $request->pontos;

            $personagem->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar personagem: ' . $e->getMessage()], 500);
        }
    }
}
