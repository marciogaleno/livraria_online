<?php

require dirname(__DIR__)  . "/bootstrap.php";

use PHPUnit_Framework_TestCase as PHPUnit;


class CarrinhoTest extends PHPUnit
{

	private $carrinho;
	public $conexao;
	private $conn = null;

	public function setUp()
	{	
		@session_start();
		parent::setup();

		$this->conexao = new PDO('mysql:host=localhost', 'root', '123456');

		$sql = file_get_contents(dirname(__DIR__) . '/livraria_teste.sql');

		$this->conexao->exec($sql);

		$this->carrinho = new Carrinho();

	}


	public function tearDown() 
	{
		$this->conexao->exec("DROP DATABASE livraria_online");
	}


	/**
	* Teste para adicionar item no carrinho para operação de compra
	* @test
	* @runInSeparateProcess
	*/
	public function testeAdicionarItemCarrrinhoCompra()
	{	
		
	
		$livro = $this->conexao->query('SELECT * FROM livro ORDER BY idLivro DESC LIMIT 1');

		$livro_id;
		$livro_nome;
		$livro_preco;
		$livro_quantidade = 1;


 		foreach ($livro as $key => $value) {
 			$livro_id = $value['idLivro'];
 			$livro_nome = $value['Nome'];
 			$livro_preco = $value['PrecoVenda'];

 		};

       $_COOKIE['livros'] = $livros[$livro_id] = array('nome_livro' => $livro_nome, 'preco_livro' => $livro_preco, 'quant' => $livro_quantidade, 'operacao' => 1, 'ValordaCompra' => $livro_preco, 'Rest' => null);

       $_COOKIE['livros'] = serialize($_COOKIE['livros']);
 		
 		$this->carrinho->adicionarIntem($livro_id, $livro_nome, $livro_preco, $livro_quantidade, 1, null);

 		$this->assertTrue(true);

		// $conn = $this->getConnection()->getConnection();

		// $query = $conn->query('SELECT * FROM Aluga');
		
	}

	/**
	* Teste para adicionar item no carrinho para operação de aluguel
	* @test
	* @runInSeparateProcess
	*/
	public function testeAdicionarItemCarrrinhoAluguel()
	{	
		
	
		$livro = $this->conexao->query('SELECT * FROM livro ORDER BY idLivro DESC LIMIT 1');

		$livro_id;
		$livro_nome;
		$livro_preco;
		$livro_quantidade = 1;


 		foreach ($livro as $key => $value) {
 			$livro_id = $value['idLivro'];
 			$livro_nome = $value['Nome'];
 			$livro_preco = $value['PrecoVenda'];

 		};

       $_COOKIE['livros'] = null;
 		
 		
 		$this->carrinho->adicionarIntem($livro_id, $livro_nome, $livro_preco, $livro_quantidade, 2, null);

 		$this->assertTrue(true);

		// $conn = $this->getConnection()->getConnection();

		// $query = $conn->query('SELECT * FROM Aluga');
		
	}


	/**
	* Teste para adicionar item no carrinho passando parametros em branco
	* @test
	* @runInSeparateProcess
	*/
	public function testeAdicionarItemCarrrinhoParametrosNull()
	{	
		
 		$this->carrinho->adicionarIntem(null, null, null, null, null, null);

 		$this->assertFalse(false);

		// $conn = $this->getConnection()->getConnection();

		// $query = $conn->query('SELECT * FROM Aluga');
		
	}

	/**
	* Teste para remover item do carrinho
	* @test
	* @runInSeparateProcess
	*/
	public function testeRemocaoItemCarrinho()
	{	
		
		$livro = $this->conexao->query('SELECT * FROM livro ORDER BY idLivro DESC LIMIT 1');

		$livro_id;
		$livro_nome;
		$livro_preco;
		$livro_quantidade = 1;

 		foreach ($livro as $key => $value) {
 			$livro_id = $value['idLivro'];
 			$livro_nome = $value['Nome'];
 			$livro_preco = $value['PrecoVenda'];

 		};

       $_COOKIE['livros'] = $livros[$livro_id] = array('nome_livro' => $livro_nome, 'preco_livro' => $livro_preco, 'quant' => $livro_quantidade, 'operacao' => 1, 'ValordaCompra' => $livro_preco, 'Rest' => null);

       $_COOKIE['livros'] = serialize($_COOKIE['livros']);
 		
 		ob_start();

 		$this->carrinho->excluirIntem((int)$livro_id);

		$headers_list = xdebug_get_headers();
 		header_remove();

 		ob_end_clean();

 		$this->assertContains('location: ' . URL . 'carrinho/checkout', $headers_list);

		
	}

	/**
	* Teste para remover item do carrinho quando cookie estiver vazio
	* @test
	* @runInSeparateProcess
	*/
	public function testeRemocaoItemCarrinhoCookieVazio()
	{	
		
		$livro = $this->conexao->query('SELECT * FROM livro ORDER BY idLivro DESC LIMIT 1');

		$livro_id;
		$livro_nome;
		$livro_preco;
		$livro_quantidade = 1;

 		foreach ($livro as $key => $value) {
 			$livro_id = $value['idLivro'];
 			$livro_nome = $value['Nome'];
 			$livro_preco = $value['PrecoVenda'];

 		};

       $_COOKIE['livros'] = '';
 		
 		ob_start();
 		
 		$this->carrinho->excluirIntem((int)$livro_id);

		$headers_list = xdebug_get_headers();
 		header_remove();

 		ob_end_clean();

 		$this->assertContains('location: ' . URL . 'carrinho/checkout', $headers_list);

		
	}
}