<?php

namespace App\Http\Controllers;

use App\Models\Usuario_Acessa_Setor;
use Illuminate\Http\Request;

class Usuario_Acessa_SetorController extends Controller
{
    function getAcessos()
    {
        $acessos = Usuario_Acessa_Setor::with('usuarios')->with('setores')->get();
        return response($acessos, 200)
            ->header('Content-Type', 'application/json')
            ->header('Access-Control-Allow-Origin', '*');
    }

    function cadastraAcesso(Request $request)
    {
        $this->validate($request, [
            'usuarioID' => 'required | numeric',
            'setorID' => 'required | numeric',
            'acessoPermitido' => 'required'
        ]);

        $exist = app('db')->select('SELECT IF(EXISTS(SELECT * FROM usuario_acessa_setor WHERE usuario_acessa_setor.usuarioID = '.$request->input('usuarioID').' AND usuario_acessa_setor.setorID = '.$request->input('setorID').'),1,0) AS ACESSO');
        
        if ($exist[0]->ACESSO == 0) {
            $acesso = Usuario_Acessa_Setor::create([
                'usuarioID' => $request->input('usuarioID'),
                'setorID' => $request->input('setorID'),
                'acessoPermitido' => $request->input('acessoPermitido')
            ]);

            return response($acesso, 200);
        }else{
            return "Este usuario já tem um registro de acesso para este setor";
        }
    }
}
