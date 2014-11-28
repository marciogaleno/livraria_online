<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of pedidomodel
 *
 * @author Márcio Vennan
 */
class CompraModel 
{
    /**
     * Every model needs a database connection, passed to the model
     * @param object $db A PDO database connection
     */
    function __construct($db) 
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    function getAll()
    {
        $sql = "SELECT * FROM pedidos as p
                LEFT JOIN compra as c ON  c.pedido_id = p.idPedido 
                LEFT JOIN livro as l ON l.idLivro = c.Livro_idLivro  
                WHERE p.idPedido is NOT NULL AND 
                 c.Cliente_idCliente = :Cliente_idCliente";
        
       $query = $this->db->prepare($sql);
        
        $query->bindValue(':Cliente_idCliente',$_SESSION['cliente_id'], PDO::PARAM_INT);  
 
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();        
    }
    
    function getAllAdmin()
    {
       $sql = "SELECT c.*, l.*, pf.Nome as nome_cliente, pf.CPF FROM pedidos as p
                LEFT JOIN compra as c ON  c.pedido_id = p.idPedido 
                LEFT JOIN livro as l ON l.idLivro = c.Livro_idLivro 
                LEFT JOIN cliente as cl ON cl.idCLiente = c.Cliente_idCliente 
                LEFT JOIN pessoafisica as pf ON pf.Cliente_idCliente = cl.idCliente";
        
       $query = $this->db->prepare($sql);
        
        $query->bindValue(':Cliente_idCliente',$_SESSION['cliente_id'], PDO::PARAM_INT);  
 
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();        
    }
}

?>
