<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of conta
 *
 * @author Márcio Vennan
 */
class Conta extends Controller{
    
    public function index(){
       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/conta/index.php';
       require 'application/views/_templates/footer.php';          
    }
    
    public function meuPedidos(){
        
       $contaModel = $this->loadModel('ContaModel');
       $pedidos = $contaModel->getPedidos();
       
       $categoriaModel = $this->loadModel('CategoriaModel');
       $categorias = $categoriaModel->getAll();         
       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/conta/index.php';
       require 'application/views/_templates/footer.php';         
    }
}

?>
