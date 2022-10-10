<?php

namespace App\Http\Controllers;

use App\Models\Tipo_Producao;
use Illuminate\Http\Request;

class Tipo_ProducaoController extends Controller
{
    function getAllTipoProducao(){
        $tipoProducao = Tipo_Producao::all();
        return response($tipoProducao,200);
    }


    function getProducaoAndTipo(){
        $producao =  Tipo_Producao::with('producao')->get();
        return response($producao,200)
                ->header('Content-Type', 'application/json')
                ->header('Access-Control-Allow-Origin','*');
    }

    function cadastraTipoProducao(Request $request) {
        $this->validate($request,[
            'tipoProducao' =>'required',
            'unidadeMedida' =>'required',
            'tipoProducaoAtivo' =>'required'
        ]);

        $tipoProducao =  Tipo_Producao::create([
            'tipoProducao' => $request->input('tipoProducao'),
            'unidadeMedida' => $request->input('unidadeMedida'),
            'tipoProducaoAtivo' => $request->input('tipoProducaoAtivo')
        ]);

        return response($tipoProducao, 200);
    }


}
