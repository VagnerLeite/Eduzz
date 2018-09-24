<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class APIController extends Controller
{
    //

    protected $client;

    public function __construct()
    {
    	$this->client = new Client();
    }

    public function getClientesAPI()
    {

    	$result = $this->client->get('http://localhost/Eduzz/lumen/public/clientes');

    	$resultado = json_decode($result->getBody()->getContents());

    	foreach($resultado AS $result){
    		echo '<p>'.$result->nome.' - <b>'.$result->cnpj.'</b></p><br />';
    	}
    }


    public function getClienteAPI($id)
    {

    	$result = $this->client->get('http://localhost/Eduzz/lumen/public/clientes/'.$id);


    	//echo $result->getBody();

    	$resultado = json_decode($result->getBody()->getContents());

		echo '<p>'.$resultado->nome.' - <b>'.$resultado->cnpj.'</b></p><br />';
    }

    public function removeClienteAPI($id)
    {

    	$result = $this->client->delete('http://localhost/Eduzz/lumen/public/clientes/'.$id);


    	echo $result->getBody();

    	//$resultado = json_decode($result->getBody()->getContents());
    }

    public function cadastraCliente()
    {
    	$result = $this->client->post('http://localhost/Eduzz/lumen/public/clientes', [
    		'form_params' => [
    			'nome' => 'Vagnao',
    			'cnpj' => 32496998880,
    			'id' => 103
    		]
    	]);

    	echo $result->getBody();

    	//$resultado = json_decode($result->getBody()->getContents());
    }

    public function alteraCliente($id)
    {

    	$result = $this->client->put('http://localhost/Eduzz/lumen/public/clientes', [
    		'form_params' => [
    			'nome' => 'Vagneer Alves Leite',
    			'cnpj' => 32496998880,
    			'id' => $id
    		]
    	]);
    	echo $result->getBody();
    	
    	//$resultado = json_decode($result->getBody()->getContents());
    }
}
