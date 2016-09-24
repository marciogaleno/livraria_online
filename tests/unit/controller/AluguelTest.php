<?php

require dirname(__DIR__, 2)   . "/bootstrap.php";

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

		$this->conexao = new PDO('mysql:host=localhost;dbname=livraria_teste', 'root', '123456');

		$this->aluguel = new Aluguel();

	}

 
	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeIndex()
	{	
		ob_start();
		$_SESSION['cliente_id'] = 10;
		$_SESSION['usuario_id'] = 2;
		$_SESSION['usuario_nome'] = 'Marcio';


 		$this->aluguel->index();

 		ob_end_clean();
 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeIndexAdmin()
	{	
		ob_start();
		$_SESSION['cliente_id'] = 10;
		$_SESSION['usuario_id'] = 2;
		$_SESSION['usuario_nome'] = 'Marcio';
		$_SESSION['usuario_logado'] = true;
		$_SESSION['tipo_user'] = 'admin';

 		$this->aluguel->indexAdmin();

 		ob_end_clean();

 		// $file = file_get_contents()

 		$this->assertTrue(fase);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeRenovarGet()
	{	
		ob_start();
		$_SERVER['REQUEST_METHOD'] = 'GET';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];
 		};
 		
 		$this->aluguel->renovar($id);

 		ob_end_clean();
 		
 		$this->assertTrue(false);
		
	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeRenovarPost()
	{	
		
		ob_start();

		$_SERVER['REQUEST_METHOD'] = 'POST';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];
 			$_POST['idAluga'] = $value['idAluga'];
 		};
 		
 		$this->aluguel->renovar($id);

 		ob_end_clean();

 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeRenovarAdminGet()
	{	
		
		ob_start();
		$_SESSION['usuario_logado'] = true;
		$_SESSION['tipo_user'] = 'admin';
		
		$_SERVER['REQUEST_METHOD'] = 'Get';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];

 		};
 		
 		$this->aluguel->renovarAdmin($id);

 		ob_end_clean();

 		$this->assertTrue(true);
		
	}


	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDevolucaoLivroUsuarioAdminMetodoGet()
	{	
		
		ob_start();
		$_SESSION['usuario_logado'] = true;
		$_SESSION['tipo_user'] = 'admin';
		
		$_SERVER['REQUEST_METHOD'] = 'Get';

		$aluguel = $this->conexao->query('SELECT * FROM Aluga ORDER BY idAluga DESC LIMIT 1');

		$id;

 		foreach ($aluguel as $key => $value) {
 			$id = $value['idAluga'];

 		};
 		
 		$this->aluguel->devolverAdmin($id);

 		ob_end_clean();

 		$this->assertTrue(true);

		// $conn = $this->getConnection()->getConnection();

		// $query = $conn->query('SELECT * FROM Aluga');
		
	}

}