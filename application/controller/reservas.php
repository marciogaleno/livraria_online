<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of reservas
 *
 * @author Márcio Vennan
 */
class Reservas extends Controller
{
    function __construct()
    {
        parent::__construct();
        
        Auth::estaLogado();
        
    }  
    
    public function index()
    {  
       $ReservaModel = $this->loadModel('ReservaModel');
       $reservas = $ReservaModel->getAll();

       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/reservas/index.php';
       require 'application/views/_templates/footer.php';          
    }
    
    public function indexAdmin()
    {  
       $ReservaModel = $this->loadModel('ReservaModel');
       $reservas = $ReservaModel->getAllAdmin();

       require 'application/views/_templates/header-admin.php';
       require 'application/views/reservas/indexAdmin.php';
       require 'application/views/_templates/footer.php';          
    }
    
    public function add($livro_id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $ReservaModel = $this->loadModel('ReservaModel');
            if ($ReservaModel->add($livro_id)){
                $this->setflash('Livro reservado com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL);
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }                 
    }
    
    public function delete($livro_id = null)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            // load model, perform an action on the model
            $ReservaModel = $this->loadModel('ReservaModel');
            if ($ReservaModel->delete($livro_id)){
                $this->setflash('Livro deletado com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . 'reservas');
                 exit;
            }else{
                $this->setflash('Erro ao salvar', array('class' => 'alert alert-error'));
            }
        }                 
    }
}

?>
