<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Pedidos
 *
 * @author Márcio Vennan
 */
class Compras extends Controller{
    //put your code here
    public function index()
    {
       $CompraModel = $this->loadModel('CompraModel');
       $compras = $CompraModel->getAll();
        
      // var_dump($pedidos);die;
       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/compras/index.php';
       require 'application/views/_templates/footer.php';         
    }
}

?>
