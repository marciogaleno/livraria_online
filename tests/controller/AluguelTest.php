<?php

require dirname(__DIR__)  . "/bootstrap.php";

use PHPUnit_Framework_TestCase as PHPUnit;


class AluguelTest extends PHPUnit
{

	public $aluguel;
	public $conexao;
	private $conn = null;

	public function setUp()
	{	
		@session_start();
		parent::setup();

		$this->conexao = new PDO('mysql:host=localhost', 'root', '123456');

		$sql = file_get_contents(dirname(__DIR__) . '/livraria_teste.sql');

		$this->conexao->exec($sql);

		$this->aluguel = new Aluguel();

	}

 
	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeIndex()
	{	
		$_SESSION['cliente_id'] = 10;
		$_SESSION['usuario_id'] = 2;
		$_SESSION['usuario_nome'] = 'Marcio';


 		$this->aluguel->index();

 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeIndexAdmin()
	{	
		$_SESSION['cliente_id'] = 10;
		$_SESSION['usuario_id'] = 2;
		$_SESSION['usuario_nome'] = 'Marcio';
		$_SESSION['usuario_logado'] = true;
		$_SESSION['tipo_user'] = 'admin';

 		$this->aluguel->indexAdmin();

 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeRenovarGet()
	{	
		
		$_SERVER['REQUEST_METHOD'] = 'GET';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];
 		};
 		
 		$this->aluguel->renovar($id);

 		$this->assertTrue(true);
		
	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeRenovarPost()
	{	
		
		$_SERVER['REQUEST_METHOD'] = 'POST';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];
 			$_POST['idAluga'] = $value['idAluga'];
 		};
 		
 		$this->aluguel->renovar($id);

 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeRenovarAdminGet()
	{	
		
		$_SESSION['usuario_logado'] = true;
		$_SESSION['tipo_user'] = 'admin';
		
		$_SERVER['REQUEST_METHOD'] = 'Get';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];

 		};
 		
 		$this->aluguel->renovarAdmin($id);

 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDevolucaoLivroUsuarioAdminMetodoGet()
	{	
		
		$_SESSION['usuario_logado'] = true;
		$_SESSION['tipo_user'] = 'admin';
		
		$_SERVER['REQUEST_METHOD'] = 'Get';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];

 		};
 		
 		$this->aluguel->devolverAdmin($id);

 		$this->assertTrue(true);

		// $conn = $this->getConnection()->getConnection();

		// $query = $conn->query('SELECT * FROM Aluga');
		
	}

}