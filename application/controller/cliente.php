<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Cliente extends Controller{
    
    public function add(){
            
        require 'application/views/_templates/header-add-cliente.php';
        require 'application/views/cliente/add.php';
        require 'application/views/_templates/footer.php';          
    } 
    
    public function addPessoaFisica(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('ClienteModel');
            if ($livroModel->addPessoaFisica()){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . 'cliente/add');
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }        
        require 'application/views/_templates/header-add-cliente.php';
        require 'application/views/cliente/add-pessoa-fisica.php';
        require 'application/views/_templates/footer.php';          
    } 
    
    public function listar()
    {
        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/cliente/list.php';
        require 'application/views/_templates/footer.php';          
    }
}
