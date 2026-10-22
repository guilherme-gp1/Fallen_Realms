<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\personagem_t_h;
use App\Models\Personagem_Status;

class Personagem_t_hController extends Controller
{
    public function exibir_personagem_status_html($id)
    {
        // Busca o personagem e os nomes da classe e da raça
        $personagem = DB::table('personagens_status')
            ->join(
                'classes',
                'classes.id',
                '=',
                'personagens_status.classe_id'
            )
            ->join(
                'racas',
                'racas.id',
                '=',
                'personagens_status.raca_id'
            )
            ->where('personagens_status.id', $id)
            ->select(
                'personagens_status.*',
                'personagens_status.id as personagem_id',
                'classes.nome as classe',
                'racas.nome as raca'
            )
            ->first();

        if (!$personagem) {
            abort(404, 'Personagem não encontrado.');
        }

        // Busca somente as habilidades disponíveis para a classe
        $habilidades = DB::table('classe_habilidade')
            ->join(
                'habilidades',
                'habilidades.id',
                '=',
                'classe_habilidade.habilidade_id'
            )
            ->where(
                'classe_habilidade.classe_id',
                $personagem->classe_id
            )
            ->select(
                'classe_habilidade.id as classe_habilidade_id',
                'habilidades.id as habilidade_id',
                'habilidades.descricao',
                'habilidades.nome'
            )
            ->get();

        // Todas as técnicas podem ser aprendidas por qualquer personagem
        $tecnicas = DB::table('tecnicas')
            ->select('id', 'nome')
            ->get();

        return view('personagem_tecnica_habilidade', [
            'personagem' => $personagem,
            'habilidades' => $habilidades,
            'tecnicas' => $tecnicas,
        ]);
    }

    public function salvar_personagem_t_h(Request $request)
    {
        $request -> validate([
            'personagem_id' => 'required|integer',
            'habilidades' => 'required|array',
            'habilidades.*' => 'required|integer',
            'tecnicas' => 'array',
            'tecnicas.*' => 'integer',
        ]);

        $personagem_t_h = new personagem_t_h(); 

        if($personagem_t_h->where('personagem_id', "=", $request->personagem_id)
            ->whereIn('habilidade_id', $request->habilidades)
            ->whereIn('tecnica_id', $request->tecnicas)
            ->exists()) {
            return response()->json(['erro' => 's', 'mensagem' => 'Habilidades e técnicas já cadastradas para este personagem'], 200);
        }

        try{
            foreach ($request->habilidades as $habilidade_id){
                Personagem_t_h::create([
                    'personagem_id' => $request->personagem_id,
                    'habilidade_id' => $habilidade_id
                ]);
            }
            foreach ($request->tecnicas as $tecnica_id){
                Personagem_t_h::create([
                    'personagem_id' => $request->personagem_id,
                    'tecnica_id' => $tecnica_id
                ]);
            }
            return response()->json(['erro' => 'n', 'mensagem' => 'Cadastro realizado com sucesso'], 200);
        } catch (\Exception $e) {
            return response()->json(['erro' => 's', 'mensagem' => 'Erro ao cadastrar habilidades e técnicas para o personagem: ' . $e->getMessage()], 500);
        }
    }
}

