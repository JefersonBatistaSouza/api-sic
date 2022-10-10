<?php

use App\Models\Animal;
use Illuminate\Http\Request;
use App\Http\Controllers\AnimalController;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    //ROTAS PARA ANIMAIS
    $router->get('/animais', 'AnimalController@getAllAnimal');
    $router->get('/animais/fornecedores', 'AnimalController@getAnimalAndFornecedor');
    $router->get('/animais/fornecedores/categorias', 'AnimalController@getAnimalAndFornecedorAndCategoria');
    $router->get('/controle-patrimonial', 'AnimalController@getControlePatrimonioAnimal');

    //ROTAS PARA INSERÇÃO DOS ANIMAIS
    $router->post('/animais', function (Request $request) {
        $animalRules = new Animal();
        $this->validate($request, $animalRules->rules);

        $animalController = new AnimalController();
        echo $animalController->cadastraAnimal($request);
    });

    //ROTAS PARA FORNECEDORES
    $router->get('/fornecedores', 'FornecedorController@fornecedores');

    //ROTAS PARA INSERÇÃO DOS FORNECEDORES
    $router->post('/fornecedores', 'FornecedorController@cadastraFornecedor');

    //ROTAS PARA SETOR
    $router->get('/setores', 'SetorController@getSetores');
    $router->post('/setores', 'SetorController@cadastraSetor');

    //ROTAS PARA CATEGORIAS DE ANIMAIS
    $router->get('/categorias-de-animais', 'Categoria_AnimalController@getCategorias');
    //ROTAS PARA INSERÇÃO DAS CATEGORIAS DE ANIMAIS
    $router->post('/categorias-de-animais', 'Categoria_AnimalController@cadastraCategoria');

    //ROTAS PARA USUARIOS
    $router->get('/usuarios', 'UsuarioController@getUsuarios');

    // ROTA PARA AUTENTICAR USUÁRIO
    $router->post('/autenticar', 'UsuarioController@autenticaUsuario');

    //ROTAS PARA ACESSOS
    $router->get('/acessos', 'Usuario_Acessa_SetorController@getAcessos');
    //ROTAS PARA INSERIR ACESSOS
    $router->post('/acessos', 'Usuario_Acessa_SetorController@cadastraAcesso');

    //ROTAS PARA PRODUCAO
    $router->get('/producao', 'ProducaoController@getProducaoAndTipoAndAnimal');
    $router->get('/producao/tipo', 'Tipo_ProducaoController@getProducaoAndTipo');
    $router->get('/producao/animais/{animalCodigo}', 'AnimalController@getProducaoAnimal');
    $router->post('/producao', 'ProducaoController@cadastraProducao');

    //ROTAS PARA TIPO DE PRODUCAO
    $router->get('/tipos-de-producao','Tipo_ProducaoController@getAllTipoProducao');
    $router->post('/tipos-de-producao','Tipo_ProducaoController@cadastraTipoProducao');
});
