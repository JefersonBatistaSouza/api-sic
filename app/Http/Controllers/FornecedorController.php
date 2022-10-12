<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    function fornecedores()
    {
        $fornecedores = Fornecedor::all();
        return response($fornecedores, 200);
    }

    function cadastraFornecedor(Request $request)
    {
        $this->validate($request, [
            'fornecedorNome' => 'required',
            'fornecedorCnpjCPF' => 'required|numeric|unique:fornecedor',
            'fornecedorAtivo' => 'required'
        ]);

        $fornecedor = Fornecedor::create([
            'fornecedorNome' => $request->input('fornecedorNome'),
            'fornecedorCnpjCPF' => $request->input('fornecedorCnpjCPF'),
            'fornecedorAtivo' => $request->input('fornecedorAtivo'),
        ]);

        return response($fornecedor,200)->header('Content-Type', 'application/json');
    }
}
