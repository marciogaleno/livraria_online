<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class Aluguel extends Controller
{
    
    public function index()
    {  
       $AluguelModel = $this->loadModel('AluguelModel');
       $alugueis = $AluguelModel->getAll();

       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/aluguel/index.php';
       require 'application/views/_templates/footer.php';          
    }
}
