<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of carrinhomodel
 *
 * @author Márcio Vennan
 */
class CarrinhoModel 
{
    private $db;
    
    function __construct($db) 
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function pagar($livros)
    {
        if (!empty($livros)){
            $this->db->beginTransaction();
            
            //Criando um pedido
            $query = $this->db->prepare('INSERT INTO pedidos (valor_total) VALUES (0)');
            $query->execute();
            $pedido_id = $this->db->lastInsertId();
            
            foreach ($livros as $livro_id => $livro){
                
                if ($livro['operacao'] == 1){
                    if (!$this->pagarCompra($livro_id, $livro,$pedido_id)){
                        die('aki');
                        $this->db->rollback();
                        return false;
                    }  
                }
                
                if ($livro['operacao'] == 2){   
                    if(!$this->pagarAluguel($livro_id, $livro, $pedido_id)){                       
                        $this->db->rollback();
                         
                        return false;                        
                    } 
                }
            }
            $this->db->commit();
            return true;
        }
        
    }
   
    /**
     * Faz  registro da compra
     * @param int $livro_id id do livro
     * @param array $livro demais dados do livro
     * @return boolean 
     */
    public function pagarCompra($livro_id, $livro, $pedido_id)
    {
        $sql = "INSERT INTO Compra " 
               . "(DataCompra,pedido_id, Cliente_idCliente,Livro_idLivro,Quantidade,ValordaCompra) "
               . "VALUES ("
               . ":DataCompra, "
               . ":pedido_id, "
               . ":Cliente_idCliente, "
               . ":Livro_idLivro, "
               . ":Quantidade, "
               . ":ValordaCompra)";
       /// echo $livro_id; echo $livro['quant']; echo $livro['ValordaCompra']; die;
        $query = $this->db->prepare($sql);

       // $query->bindValue(':pedido_id', 1, PDO::PARAM_INT);
        $query->bindValue(':DataCompra', date("y/m/d H:i:s"), PDO::PARAM_STR);
        $query->bindValue(':pedido_id', $pedido_id, PDO::PARAM_INT);
        $query->bindValue(':Cliente_idCliente', (int)$_SESSION['cliente_id'], PDO::PARAM_INT);
        $query->bindValue(':Livro_idLivro', $livro_id, PDO::PARAM_INT);
        $query->bindValue(':Quantidade', (int)$livro['quant'], PDO::PARAM_INT);                    
        $query->bindValue(':ValordaCompra', (float)$livro['ValordaCompra']); 
        //$this->db->commit();
        if ($query->execute()){                           
            return true;
        }
        return false;        
    }
    
    /**
     * Faz  registro da compra
     * @param int $livro_id id do livro
     * @param array $livro demais dados do livro
     * @return boolean 
     */
    public function pagarAluguel($livro_id, $livro, $pedido_id)
    {          
        $sql = "INSERT INTO Aluga " 
               . "(pedido_id, DataAluguel, ValorAluguel,ValorMulta,DataDevolucao,Cliente_idCLiente,Livro_idLivro) "
               . " VALUES ("
               . ":pedido_id, "
               . ":DataAluguel, "
               . ":ValorAluguel, "
               . ":ValorMulta, "
               . ":DataDevolucao, "
               . ":Cliente_idCLiente, "
               . ":Livro_idLivro)";
       /// echo $livro_id; echo $livro['quant']; echo $livro['ValordaCompra']; die;
        $query = $this->db->prepare($sql);

       // $query->bindValue(':pedido_id', 1, PDO::PARAM_INT);
        $query->bindValue(':pedido_id', $pedido_id, PDO::PARAM_INT);
        $query->bindValue(':DataAluguel', date("y/m/d"), PDO::PARAM_STR);
        $query->bindValue(':ValorAluguel', (float)$livro['ValordaCompra']);
        $query->bindValue(':ValorMulta',(float)2.0);
        $query->bindValue(':DataDevolucao', date('y/m/d', strtotime("+13 days")),  PDO::PARAM_STR);
        $query->bindValue(':Cliente_idCLiente', (int)$_SESSION['cliente_id'], PDO::PARAM_INT);
        $query->bindValue(':Livro_idLivro', $livro_id, PDO::PARAM_INT);
        
        //$this->db->commit();
        if ($query->execute()){
            return true;
        }
        return false;        
    }
}

?>
