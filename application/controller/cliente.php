<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
class Cliente extends Controller{
    
    public function add(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('ClienteModel');
            if ($livroModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name . '/listAdmin/'. $livro_id);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/cliente/add.php';
        require 'application/views/_templates/footer.php';          
    } 
    
    public function addPessoaFisica(){
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // load model, perform an action on the model
            $livroModel = $this->loadModel('ClienteModel');
            if ($livroModel->add($_POST)){
                $this->setflash('Salvo com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . $this->name . '/listAdmin/'. $livro_id);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }        
        require 'application/views/_templates/header-admin.php';
        require 'application/views/cliente/add-pessoa-fisica.php';
        require 'application/views/_templates/footer.php';          
    } 
}
