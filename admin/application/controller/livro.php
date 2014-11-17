<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Livro extends Controller
{
    function index()
    {   
       $livroModel = $this->loadModel('LivroModel');
       $livros = $livroModel->getAll();
       
       //var_dump($livros); 
       
       require 'application/views/_templates/header.php';
       require 'application/views/livro/index.php';
       require 'application/views/_templates/footer.php';        
    }
    
    function view($id = null)
    {        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('LivroModel');
            $livro = $livroModel->get($id);  
        }
        
        require 'application/views/_templates/header.php';
        require 'application/views/livro/view.php';
        require 'application/views/_templates/footer.php';  
    }
    
    function add()
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('LivroModel');
            if ($livroModel->add($_POST)){
                $message = $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
            }else{
                $message = $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/livro/add.php';
        require 'application/views/_templates/footer.php';         
    }
    
    
}

