<?php

namespace App\Http\Controllers;

use App\Clientes;
use Illuminate\Http\Request;

class APIController extends Controller
{
    public function ListaUsuario()
    {
    	$json = [
            
    		'usuario' => [
    			'nome' => 'Vagner',
    			'idade' => 33
    		],
    		'usuario2' => [
    			'nome' => 'Vinicius',
    			'idade' => 25
    		]

        ];

        #status code - posso manipular o status code; 
        return response($json, 201)
        ->header('Content-Type', 'application/json');
    }

    public function ListaClientes()
    {
    	$clientes = Clientes::all();

    	return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    #Aqui eu criei o Metodo com o parametro de $id do Cliente, que indiquei no route
    public function ListaCliente($id)
    {
    	$clientes = Clientes::find($id); #aqui como recebi um $id no parametro, ao inves de usar o all() uso o find para buscar o cliente especifico

    	return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    
    public function CadastraCliente(Request $data) #Aqui passo o meu request, e ele cadastra dentro da rota
    {
    	$clientes = Clientes::create([
    		#### Aqui eu passo os dados que eu preciso, e o data vai la e busca o nome, cnpj que preciso
    		'nome' => $data->nome,
    		'cnpj' => $data->cnpj
    	]);

    	return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    public function DeleteCliente($id) #Delete sempre recebe um id
    {

    	$clientes = Clientes::find($id);

    	$clientes->delete();

    	return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }

    public function AlteraCliente(Request $data) #Alterar um id especifico, Alem de receber o Id, eu preciso do request para alteracao
    {

    	$clientes = Clientes::find($data->id);

    	$clientes->nome = $data->nome;
    	$clientes->cnpj = $data->cnpj;

    	$clientes->save();

    	return response($clientes, 201)
        ->header('Content-Type', 'application/json');
    }
}
