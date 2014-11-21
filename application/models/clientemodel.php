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
    public function addPessoaFisica()
    {
        //Adicionando cliente
        $this->db->beginTransaction();
        
        //Adicionando CLiente
        if ($this->addCliente()){           
            $cliente_id = $this->db->lastInsertId();
        }else{//Se não salvar abortar
            $this->db->rollback();
            return false;
        }
        
        //Adicionando pessoa física
        $sql = "INSERT INTO PessoaFisica SET Nome = :Nome, CPF = :CPF, RG = :RG,"
                . " DataNascimento = :DataNascimento, Cliente_idCliente = :Cliente_idCliente"; 
        
        $query = $this->db->prepare($sql);
        //echo $cliente_id; die;
        $query->bindValue(':Nome', $_POST['Nome']);
        $query->bindValue(':CPF', $_POST['CPF']);
        $query->bindValue(':RG', $_POST['RG']);
        $query->bindValue(':DataNascimento', $_POST['DataNascimento']);
        $query->bindValue(':Cliente_idCliente', $cliente_id);
        
        //Se não salva abortar
        if (!$query->execute()){
            $this->db->rollback();
            return false;
        }
        
        //Adicionando usuário de acesso ao sistema;
        
        $hash = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        
        $sql = "INSERT INTO usuario SET nome = :nome, "
                . "email = :email, "
                . "senha = :senha,"
                . "tipo_user = :tipo_user";
        
        $query = $this->db->prepare($sql); 
        
        
        if ($query->execute(array(
            'nome' => $_POST['Nome'],
            'email' => $_POST['EmailCli'],
            'senha' => $hash,
            'tipo_user' => 'cliente'
        ))){//Se até aqui nada falou nada, confirmar persistencia no bd
            $this->db->commit();
            return true;
        } 
        
        $this->db->rollback();
        return false;
    } 
    
    function addCliente()
    {
        $sql = "INSERT INTO Cliente SET EnderecoCli = :EnderecoCli, TelefoneCli = :TelefoneCli,"
                . " EmailCli = :EmailCli";
        
        $query = $this->db->prepare($sql); 
        
        $query->bindValue(':EnderecoCli', $_POST['EnderecoCli']);
        $query->bindValue(':TelefoneCli', $_POST['TelefoneCli']);
        $query->bindValue(':EmailCli', $_POST['EmailCli']);
        
        if ($query->execute()){
            return true;
        }
        
        return false;
    }
}

?>
