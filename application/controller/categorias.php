<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of categorias
 *
 * @author Márcio Vennan
 */
class Categorias extends Controller 
{
    function index()
    {   
       $categoriaModel = $this->loadModel('CategoriaModel');
       $categorias = $categoriaModel->getAll();
       
       //var_dump($livros); 
       
       require 'application/views/_templates/header-admin.php';
       require 'application/views/categorias/index.php';
       require 'application/views/_templates/footer.php';  

    }
     function listaLivrosPorCategoria($id)
    {   
       $livroModel = $this->loadModel('LivroModel');
       $livros = $livroModel->getLivrosPorCategoria($id);
       
       $categoriaModel = $this->loadModel('CategoriaModel');
       $categorias = $categoriaModel->getAll();
       
       $categoria2 = $categoriaModel->get($id);
       //var_dump($categoria2['nome']); die;
       $categoria_nome = $categoria2['nome'];
       
       require 'application/views/_templates/header.php';
       require 'application/views/categorias/lista-produtos.php';
       require 'application/views/_templates/footer.php';  
       //var_dump($_GET); die;
    }
    
    function add()
    {    
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $categoriaModel = $this->loadModel('CategoriaModel');
            if ($categoriaModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . 'categorias' . '/index/');
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }        
       require 'application/views/_templates/header-admin.php';
       require 'application/views/categorias/add.php';
       require 'application/views/_templates/footer.php';           
    }
    
    function edit($categoria_id = null)
    {    
        $CategoriaModel = $this->loadModel('CategoriaModel');
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            if ($CategoriaModel->edit($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . 'categorias' . '/index/');
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }       
         // load model, perform an action on the model
        $categoria = $CategoriaModel->get($categoria_id);          
        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/categorias/edit.php';
        require 'application/views/_templates/footer.php';         
    }  
    
    function delete($id = null)
    {        
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $CategoriaModel = $this->loadModel('CategoriaModel');
            $livro = $CategoriaModel->delete($id);
            $message = $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
            header('Location: '. URL . $this->name . '/listAdmin/');
        }

    }    
}

