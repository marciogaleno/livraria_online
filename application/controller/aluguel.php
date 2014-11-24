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
       
       $nao_devolvidos = $AluguelModel->livrosNaoDevolvidos();
     
       //var_dump($nao_devolvidos); die;
       
       foreach ($alugueis as $aluguel) {
           foreach ($nao_devolvidos as $nao_devolvido) {
               if ($aluguel['idAluga'] == $nao_devolvido['idAluga']){
                   $AluguelModel->aplicaMulta($nao_devolvido['idAluga'],$nao_devolvido['DataDevolucao']);
               }
           }
       }
       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/aluguel/index.php';
       require 'application/views/_templates/footer.php';          
    }
    
    public function indexAdmin()
    {  
       $AluguelModel = $this->loadModel('AluguelModel');
       $alugueis = $AluguelModel->getAllAdmin();
       
       $nao_devolvidos = $AluguelModel->livrosNaoDevolvidos();
     
       //var_dump($nao_devolvidos); die;
       
       foreach ($alugueis as $aluguel) {
           foreach ($nao_devolvidos as $nao_devolvido) {
               if ($aluguel['idAluga'] == $nao_devolvido['idAluga']){
                   $AluguelModel->aplicaMulta($nao_devolvido['idAluga'],$nao_devolvido['DataDevolucao']);
               }
           }
       }
       require 'application/views/_templates/header-admin.php';
       require 'application/views/aluguel/indexAdmin.php';
       require 'application/views/_templates/footer.php';          
    }
    
    public function renovar($id)
    {  
        $AluguelModel = $this->loadModel('AluguelModel');
        if ($_SERVER['REQUEST_METHOD'] == 'GET') { 
            if ($AluguelModel->isReserva($id)){
                 $this->setflash('Você não pode renovar o livro, pois já existe uma reserva para o mesmo.', array('class' => 'alert alert-danger'));
                 header('Location: '. URL . 'aluguel'. '/index/');
                 exit;                 
            }
           $aluguel = $AluguelModel->get($id);
           
        }
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {           
           
            
            if ($AluguelModel->renovar($_POST['idAluga'])){
                $this->setflash('Livro renovado com sucesso', array('class' => 'alert alert-success'));
                 header('Location: '. URL . 'aluguel'. '/index/');
                 exit;                
            }else{
                $this->setflash('Erro ao renovado livro', array('class' => 'alert alert-success'));
                header('Location: '. URL . 'aluguel'. '/index/');  
                exit;
            }
        }
        
       
       require 'application/views/_templates/header-conta-user.php';
       require 'application/views/aluguel/renovar.php';
       require 'application/views/_templates/footer.php';           
    }
    
    function add($reserva_id, $cliente_id, $livro_id, $preco_aluguel)
    {
         $AluguelModel = $this->loadModel('AluguelModel');
         if ($AluguelModel->add($reserva_id, $cliente_id, $livro_id, $preco_aluguel)){
           $this->setflash('Livro renovado com sucesso', array('class' => 'alert alert-success'));
           header('Location: '. URL . 'reservas'. '/indexAdmin');
           exit;   
         }
    }
    
 
}
