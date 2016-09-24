<?php

require dirname(__DIR__, 2)  . "/bootstrap.php";

Use PHPUnit_Framework_TestCase as PHPUnit;


class AdminTest extends PHPUnit
{

	public $admin;
	protected $_SERVER;

	public function setUp()
	{	
		@session_start();
		parent::setup();

		$this->admin = new Admin();

	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDeLoginSucesso()
	{	
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST['senha'] = 'mgv123';
		$_POST['email'] = 'marciovennan@gmail.com';

		
		ob_start();

 		$this->admin->login();

 		$headers_list = xdebug_get_headers();
 		header_remove();

 		ob_end_clean();

 		$this->assertContains('location: ' . URL . 'admin/index2', $headers_list);
		
	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDeLoginErro()
	{	
		$_SERVER['REQUEST_METHOD'] = 'POST';
		$_POST['senha'] = 'mgv12';
		$_POST['email'] = 'marciovennan@gmail.com';

		ob_start();

 		$this->admin->login();

 		$headers_list = xdebug_get_headers();
 		header_remove();

 		ob_end_clean();

 		$this->assertContains('location: ' . URL . 'admin/login', $headers_list);
		
	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDeLogout()
	{	

		ob_start();

 		$this->admin->logout();

 		$headers_list = xdebug_get_headers();
 		header_remove();

 		ob_end_clean();

 		$this->assertContains('location: ' . URL . 'admin/login', $headers_list);
		
	}
}