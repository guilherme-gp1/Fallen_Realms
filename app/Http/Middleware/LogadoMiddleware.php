<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Usuario;
use App\Models\TokenUsuario;
use Illuminate\Support\Facades\Cookie;

class LogadoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {


        if (Cookie::has('token_usuario')) {

       
            
          $token = $request->cookie('token_usuario');

            $tokenUsuario = TokenUsuario::where('token', '=', $token)
                ->where('valido_ate', '>', now())
                ->first();

              

            if ($tokenUsuario) {
                $usuario = Usuario::find($tokenUsuario->usuario_id);
                $request->usuario = $usuario;
                return $next($request);
            } else {
                Cookie::forget('token_usuario');
                return redirect('/login');
            }
        } else {
            return redirect('/login');
        }
    }
}