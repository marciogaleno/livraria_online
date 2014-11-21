<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clientemodel
 *
 * @author Márcio Vennan
 */
class ClienteModel {
    
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
    
   /**
     * adicona um livro
     * @param srray $data
     */
    public function add($livro)
    {
        //Adicionando cliente
        $sql = "INSERT INTO cliente SET EnderecoCli = :EnderecoCli, TelefoneCli = :TelefoneCli,"
                . " EmailCli = :EmailCli, HomePageCli = :HomePageCli";
        
        $query = $this->db->prepare($sql); 
        
        $livro['PrecoVenda'] = (float)$livro['PrecoVenda'];
        $livro['PrecoAluguel'] = (float)$livro['PrecoAluguel'];
        $livro['PrecoReserva'] = (float)$livro['PrecoReserva'];
        $livro['Quant_venda'] = (int)$livro['Quant_venda'];
        $livro['Quant_aluguel'] = (int)$livro['Quant_aluguel'];
        $livro['AnoPublicacao'] = (int)$livro['AnoPublicacao'];
        
        if ($query->execute($livro)){
            return true;
        } 
        
        return false;
    }    
}

?>
