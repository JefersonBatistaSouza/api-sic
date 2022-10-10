<?php

namespace App\Http\Controllers;
use App\Models\Producao;
use Illuminate\Http\Request;

class ProducaoController extends Controller
{
    function getProducaoAndTipoAndAnimal(){
        $producao = Producao::with('tipo_producao')->with('animal')->get();
        return response($producao,200)
                ->header('Content-Type', 'application/json')
                ->header('Access-Control-Allow-Origin','*');
    }

    function cadastraProducao(Request $request){
        $this->validate($request,[
            'producaoAnimal' => 'required | numeric',
            'producaoTipo' => 'required | numeric',
            'producaoQuantidade' => 'required | numeric',
            'producaoDescricao' => 'required',
            'producaoValorEstimado' => 'required | numeric',
        ]);

        $producao = Producao::create([
            'producaoAnimal' => $request->input("producaoAnimal"),
            'producaoQuantidade' => $request->input("producaoQuantidade"),
            'producaoDescricao' => $request->input("producaoDescricao"),
            'producaoValorEstimado' => $request->input("producaoValorEstimado"),
            'producaoTipo' => $request->input("producaoTipo"),  
        ]);

        return response($producao,200);
    }
}
