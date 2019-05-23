<?php

namespace App;

class Controller 
{
	protected $clientes = [
		['id' => 1, 'nome' => 'Antônio Silva', 'telefone' => '119990000'],
		['id' => 2, 'nome' => 'João Silva', 'telefone' => '158999999'],
		['id' => 3, 'nome' => 'Maria Silva', 'telefone' => '119999001'],
		['id' => 4, 'nome' => 'Marta Santos', 'telefone' => '189990001'],
		['id' => 5, 'nome' => 'Paulo Moura', 'telefone' => '1799990002'],
	];

	public function index()
	{


		$data = array_map(function($row){

			return '<tr><td>' . $row['nome'] . '</td><td>' . $row['telefone'] . '</td><td><a href="' . route('clientes.show', $row['id'])  .'">Detalhes</a></td></tr>';

		}, $this->clientes);

		echo '<table>' . implode('', $data) .'</table>';

	}

	public function show($id) 
	{

		foreach ($this->clientes as $row) {
			if($row['id'] == $id) {
				$cliente = $row;
				break;
			}
		}

		$data = 'nome: ' . $cliente['nome'] . '</br>telefone: ' . $cliente['telefone'];
		$data .= "<br /><a href='" . route('clientes.index') . "'>Clique aqui para voltar para lista</a>";
		echo $data;

	}

	public function teste(){
	 echo json_encode(['msg'=>'funcionou']);
	}
}
