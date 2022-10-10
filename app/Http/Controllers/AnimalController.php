<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    function getAllAnimal()
    {
        $animais = Animal::all();
        return response($animais, 200)
            ->header('Access-Control-Allow-Origin', '*');
    }

    function getAnimalAndFornecedor()
    {
        $animalForncedor = Animal::with('fornecedor')->get();
        return response($animalForncedor, 200)
            ->header('Access-Control-Allow-Origin', '*');
    }
    function getAnimalAndFornecedorAndCategoria()
    {
        $animalForncedor = Animal::with('fornecedor')->with('categoria')->get();
        return response($animalForncedor, 200)
            ->header('Content-Type', 'application/json');
    }

    function getProducaoAnimal($animalCodigo)
    {
        $producao = Animal::where('animalCodigo', $animalCodigo)->with('producao')->get();
        return response($producao, 200)
            ->header('Access-Control-Allow-Origin', '*');
    }

    function getControlePatrimonioAnimal()
    {
        $patrimonio = app('db')->select("
        SELECT 
            (SELECT COUNT(animal.animalSituacao) FROM animal WHERE animal.animalSituacao = 'ABATIDO') AS animalAbatido,
            (SELECT COUNT(animal.animalSituacao) FROM animal WHERE animal.animalSituacao = 'EM VIDA') AS animalEmVida
        FROM 
            animal
        GROUP BY animalAbatido, animalEmvida");
        return response($patrimonio, 200)
            ->header('Content-Type', 'application/json');
    }

    function cadastraAnimal(Request $request)
    {
        $animal =  Animal::create([
            'animalCodigo' => $request->animalCodigo,
            'animalNome' => $request->animalNome,
            'animalRaca' => $request->animalRaca,
            'animalOrigem'  => $request->animalOrigem,
            'animalSexo'  => $request->animalSexo,
            'animalPrenhez'  => $request->animalPrenhez,
            'animalLactacao' => $request->animalLactacao,
            'animalCategoriaAnimal'  => $request->animalCategoriaAnimal,
            'animalTipo'  => $request->animalTipo,
            'animalFornecedor'  =>  $request->animalFornecedor,
            'animalPeso'  => $request->animalPeso,
            'animalPesoLote' => $request->animalPesoLote,
            'animalPrecoLote' => $request->animalPrecoLote,
            'animalPreco'  => $request->animalPreco,
            'animalNumeroLote'  => $request->animalNumeroLote,
            'animalPostura'  => $request->animalPostura,
            'animalCorte'  => $request->animalCorte,
            'animalSituacao'  => $request->animalSituacao
        ]);

        return response($animal, 200)
            ->header('Content-Type', 'application/json');
    }
}
