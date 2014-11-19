<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Livro extends Controller
{
    public $name = 'livro';

    function __construct()
    {
        parent::__construct();
        
        Auth::estaLogado();
        
    }   
    
    function index()
    {   
       $livroModel = $this->loadModel('LivroModel');
       $livros = $livroModel->getAll();
       
       $categoriaModel = $this->loadModel('CategoriaModel');
       $categorias = $categoriaModel->getAll();

       require 'application/views/_templates/header.php';
       require 'application/views/livro/index.php';
       require 'application/views/_templates/footer.php';  
       var_dump($_GET); die;
    }
    
    function view($id = null)
    {        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('LivroModel');
            $livro = $livroModel->get($id);  
        }
        
        $categoriaModel = $this->loadModel('CategoriaModel');
        $categorias = $categoriaModel->getAll(); 
        
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
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name . '/listAdmin/'. $livro_id);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/livro/add.php';
        require 'application/views/_templates/footer.php';         
    }
    
    function listAdmin()
    {
        // load model, perform an action on the model
        $livroModel = $this->loadModel('LivroModel');
        $livros = $livroModel->getAll();  

        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/livro/list-admin.php';
        require 'application/views/_templates/footer.php';          
    }
     
    function editAdmin($livro_id = null)
    {    
        $livroModel = $this->loadModel('LivroModel');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            if ($livroModel->edit($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));                
                header('Location: '. URL . $this->name . '/listAdmin/'. $livro_id);
                exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
                exit;
            }
        }       
         // load model, perform an action on the model
        $livro = $livroModel->get($livro_id);          
        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/livro/edit-admin.php';
        require 'application/views/_templates/footer.php';         
    }  
    
    function delete($id = null)
    {        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('LivroModel');
            $livro = $livroModel->delete($id);
            if ($livro){
                $this->setflash('Deletado com sucesso', array('class' => 'alert alert-success'));
                header('Location: '. URL . $this->name . '/listAdmin/');
                exit;
            }else{
                $this->setflash('Erro ao excluir', array('class' => 'alert alert-error'));
                header('Location: '. URL . $this->name . '/listAdmin/');                
            }
        }


    }    
}

