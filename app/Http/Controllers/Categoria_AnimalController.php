<?php

namespace App\Http\Controllers;

use App\Models\Categoria_Animal;
use Illuminate\Http\Request;

class Categoria_AnimalController extends Controller
{
    function getCategorias(){
        $categorias = Categoria_Animal::all();
        return response($categorias, 200)
        ->header('Access-Control-Allow-Origin', '*');
    }

    function cadastraCategoria(Request $request)
    {
        $this->validate($request, [
            'categoriaNome' => 'required|unique:Categoria_Animal',
            'categoriaPorte' => 'required',
            'categoriaZootecnica' => 'required',
            'categoriaClassificacao' => 'required',
            'categoriaAtiva' => 'required'
        ]);

        $categoria = Categoria_Animal::create([
            'categoriaNome' => $request->input('categoriaNome'),
            'categoriaPorte' => $request->input('categoriaPorte'),
            'categoriaZootecnica' => $request->input('categoriaZootecnica'),
            'categoriaClassificacao' => $request->input('categoriaClassificacao'),
            'categoriaAtiva' => $request->input('categoriaAtiva')
        ]);

        return response($categoria);
    }
}
