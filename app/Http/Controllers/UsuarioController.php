<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    function getUsuarios(){
        $usuarios = Usuario::all();
        return response($usuarios, 200)
        ->header('Access-Control-Allow-Origin', '*');
    }

    function autenticaUsuario(Request $request){
        $this->validate($request,[
            'usuarioEmail' => 'required | email',
            'usuarioSenha' => 'required'
        ]);

        $exist = app('db')->select('SELECT IF(EXISTS(SELECT * FROM usuario WHERE usuarioEmail = "'.$request->input('usuarioEmail').'" AND usuarioSenha = "'.$request->input('usuarioSenha').'"),1,0) AS ACESSO');
        if ($exist[0]->ACESSO == 0) {
            return response($exist, 400);
        }else{
            return response(json_encode($exist), 200);
        }
    }
}
