<?php

require dirname(__DIR__, 2)   . "/bootstrap.php";

use PHPUnit_Framework_TestCase as PHPUnit;


class AluguelModelTest extends PHPUnit
{

	public $controller;
	public $aluguelModel;

	public function setUp()
	{	
		@session_start();
		parent::setup();

		$this->controller = new Controller();
		

	}

	/**
	* Teste para calcular a multa de aluguel de livros entregues depois da data prevista de entrega
	* Valor da multa por dia = 1.50
	* @test
	*/
	public function testeParaCalcularMultaDeAluguel()
	{	

		$aluguelModel = $this->controller->loadModel('aluguelModel');

		$data_prevista_entrega = '07-09-2016';
		$data_devolução = '10-09-2016';

		$dias_em_atraso = 3;
		$valor_multa_dia = 1.5;
		$total_multa = $dias_em_atraso * $valor_multa_dia;

 		// valor da multa por dia é R$ 1.50, então no caso das datas de exemplo que simula 3 
 		// dias de atraso o método calculaMulta deve retornar o valor 4.5.
		$this->assertEquals($total_multa, $aluguelModel->calculaMulta($data_prevista_entrega, $data_devolução));
		
	}

}
