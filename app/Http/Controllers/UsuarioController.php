<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public function mostrarTodosUsuarios()
    {
        return response()->json(Usuario::all());//retorna usuarios do banco
    }

    public function cadastrarUsuario(Request $request)
    {
        //inserindo um Usuario
        $usuario = new Usuario;
        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->password;
        $usuario->verificado = $request->verificado;

        //precisa salvar o registro no banco;
        $usuario->save();
        return response()->json($usuario);
    }

    public function mostrarUmUsuario($id)
    {
        return response()->json(Usuario::find($id));
    }

    public function atualizarUsuario($id, Request $request)
    {
        $usuario = Usuario::find($id);

        $usuario->email = $request->email;
        $usuario->usuario = $request->usuario;
        $usuario->password = $request->password;
        $usuario->verificado = $request->verificado;

        $usuario->save();
        return response()->json($usuario);
    }

    public function deletarUsuario($id)
    {
        $usuario = Usuario::find($id);

        $usuario->delete();
        return response()->json('Deletado com sucesso', 200);
    }

    //
}
