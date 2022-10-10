<?php

namespace App\Http\Controllers;

use App\Models\Setor;
use Illuminate\Http\Request;

class SetorController extends Controller
{
    function getSetores(){
        $setores =  Setor::all();
        return response($setores, 200)
        ->header('Access-Control-Allow-Origin', '*');
    }

    function cadastraSetor(Request $request){
        $this->validate($request,[
            'setorNome' => 'required|unique:Setor',
            'setorDescricao' => 'required',
            'setorSigla' => 'required|unique:Setor',
            'setorAtivo' => 'required'
        ]);

        $setor = Setor::create([
            'setorNome' => $request->input('setorNome'),
            'setorDescricao' => $request->input('setorDescricao'),
            'setorSigla' => $request->input('setorSigla'),
            'setorAtivo' => $request->input('setorAtivo')
        ]);

        return response($setor,200);
    }
}
