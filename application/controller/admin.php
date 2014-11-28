<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Admin extends Controller
{
    function __construct()
    {
        parent::__construct();
        
    } 
    
    function index(){
        Auth::estaLogadoAdmin();
        require 'application/views/_templates/header-admin.php';
        require 'application/views/admin/index.php';
        require 'application/views/_templates/footer.php';  
    }
    
    function login(){
        
       if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            // run the login() method in the login-model, put the result in $login_successful (true or false)
            $login_model = $this->loadModel('LoginModel');
            // perform the login method, put result (true or false) into $login_successful
            $login_successful = $login_model->login();

            // check login status
            if ($login_successful) {
                // if YES, then move user to dashboard/index (btw this is a browser-redirection, not a rendered view!)
                header('location: ' . URL . 'admin/index');
            } else {
                // if NO, then move user to login/index (login form) again
                header('location: ' . URL . 'admin/login');
            }
        }
        require 'application/views/_templates/header-login.php';
        require 'application/views/admin/login.php';
        require 'application/views/_templates/footer.php';  
    }
}
