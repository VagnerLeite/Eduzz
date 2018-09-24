<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


$router->get('/clientes-api', 'APIController@getClientesAPI'); # trago todos os Clientes
$router->get('/clientes-api/{id}', 'APIController@getClienteAPI'); # trago Um cliente especifico
$router->get('/deleta-cliente/{id}', 'APIController@removeClienteAPI'); # Deleto um Cliente da minha API
$router->get('/cadastra-cliente', 'APIController@cadastraCliente'); # Metodo de Cadastrar Cliente
$router->get('/altera-cliente/{id}', 'APIController@alteraCliente'); # Metodo de Deletar Cliente => Toda vez que essa rota for acessada passando com o metodo delete, ela apaga o id citado
