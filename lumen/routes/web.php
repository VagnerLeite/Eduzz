<?php

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

$router->get('/teste', 'ExampleController@teste');

$router->get('/lista-usuarios', 'APIController@ListaUsuario');

$router->get('/clientes', 'APIController@ListaClientes'); # trago todos os Clientes
$router->get('/clientes/{id}', 'APIController@ListaCliente'); # Trago um cliente especifico
$router->post('/clientes', 'APIController@CadastraCliente'); # Metodo de Cadastrar Cliente
$router->delete('/clientes/{id}', 'APIController@DeleteCliente'); # Metodo de Deletar Cliente => Toda vez que essa rota for acessada passando com o metodo delete, ela apaga o id citado
$router->put('/clientes', 'APIController@AlteraCliente'); # Metodo de Alterar Cliente