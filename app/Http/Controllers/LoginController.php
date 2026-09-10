<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\TokenUsuario;

class LoginController extends Controller
{
    
    public function login_usuario_html(Request $request)
    {
        return view('login');
    }

    public function login_usuario_post(Request $request){
        $request->validate([
            'email' => 'required',
            'senha' => 'required',
        ]);

        $usuario = Usuario::where('email', '=', $request->email)
        ->where('senha', '=', md5($request->senha))->first();
        
        if($usuario){
            $token = new TokenUsuario();
            TokenUsuario::where('usuario_id', '=', $usuario->id)->delete();
            $token->usuario_id = $usuario->id;
            $token->token = md5($usuario->email . now());
            $token->valido_ate = now()->addHours(10);
            $token->save();

            return response()->json(['erro' => 'n', 'mensagem' => 'Login realizado com sucesso', 'token' => $token->token], 200);
        } else {
            return response()->json(['erro' => 's', 'mensagem' => 'Email ou senha incorretos'], 200);
        }
    }
}
