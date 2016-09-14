<?php

// require __DIR__  . "/../bootstrap.php";
// require __DIR__  . "/../../application/controller/admin.php";

use PHPUnit_Framework_TestCase as PHPUnit;


class AdminTest extends PHPUnit
{

	// public $admin;
	// protected $_SERVER;
	// protected $url;

	public function setUp()
	{	
		// @session_start();
		// parent::setup();
		// $this->url = 'http://livrariaonline.ga/';

		// $this->admin = new Admin();

	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDeLoginSucesso()
	{	
		// $_SERVER['REQUEST_METHOD'] = 'POST';
		// $_POST['senha'] = 'mgv123';
		// $_POST['email'] = 'marciovennan@gmail.com';

		// ob_start();

 	// 	$this->admin->login();

 	// 	$headers_list = xdebug_get_headers();
 	// 	header_remove();

 	// 	ob_end_clean();

 	// 	$this->assertContains('location: ' . $this->url . 'admin/index', $headers_list);
		
	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDeLoginErro()
	{	
		// $_SERVER['REQUEST_METHOD'] = 'POST';
		// $_POST['senha'] = 'mgv123';
		// $_POST['email'] = 'marciovennan@gmail.com';

		// ob_start();

 	// 	$this->admin->login();

 	// 	$headers_list = xdebug_get_headers();
 	// 	header_remove();

 	// 	ob_end_clean();

 	// 	$this->assertContains('location: ' . $this->url . 'admin/login', $headers_list);
		
	}

	/**
	* @test
	* @runInSeparateProcess
	*/
	public function testeDeLogout()
	{	

		// ob_start();

 	// 	$this->admin->logout();

 	// 	$headers_list = xdebug_get_headers();
 	// 	header_remove();

 	// 	ob_end_clean();

 	// 	$this->assertContains('location: ' . $this->url . 'admin/login', $headers_list);
		
	}
}