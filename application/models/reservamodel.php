<?php 

class ReservaModel
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
    
    public function getAll()
    {
        $sql = 'SELECT * FROM reserva as r 
               INNER JOIN livro as l ON l.idLivro = r.Livro_idLivro  
               INNER JOIN cliente as c ON c.idCliente = r.Cliente_idCliente  
               WHERE r.Cliente_idCLiente = :Cliente_idCLiente';
       //echo $_SESSION['cliente_id']; die;
        $query = $this->db->prepare($sql);
        
        $query->bindValue(':Cliente_idCLiente',$_SESSION['cliente_id'], PDO::PARAM_INT);  
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function getAllAdmin()
    {
        $sql = 'SELECT l.Nome as NomeLivro,l.PrecoAluguel, l.idLivro, c.idCliente, r.DataReserva,r.idReserva, pf.Nome as ClienteNome, pf.CPF FROM reserva as r 
               INNER JOIN livro as l ON l.idLivro = r.Livro_idLivro  
               INNER JOIN cliente as c ON c.idCliente = r.Cliente_idCliente 
               LEFT JOIN pessoafisica as pf ON pf.Cliente_idCliente = c.idCliente 
               LEFT JOIN pessoajuridica as pj ON pj.Cliente_idCliente = c.idCliente';
        
       //echo $_SESSION['cliente_id']; die;
        $query = $this->db->prepare($sql);
 
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
        
    public function add($livro_id)
    {
        $sql = "INSERT INTO reserva SET
                 DataReserva = :DataReserva, Cliente_idCliente = :Cliente_idCliente,
                 Livro_idLivro = :Livro_idLivro";
        
        $query = $this->db->prepare($sql); 
        
       // $query->bindValue(':pedido_id', 1, PDO::PARAM_INT);
        $query->bindValue(':DataReserva', date("y/m/d"),PDO::PARAM_STR);
        $query->bindValue(':Cliente_idCliente', $_SESSION['cliente_id']);     
        $query->bindValue(':Livro_idLivro',$livro_id);  

        if ($query->execute()){
            return true;
        }
        
        return false;
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM reserva WHERE idReserva = :idReserva";
        $query = $this->db->prepare($sql); 
        
       // $query->bindValue(':pedido_id', 1, PDO::PARAM_INT);
        $query->bindValue(':idReserva', $id, PDO::PARAM_INT);  
        
        if ($query->execute()){
            return true;
        }
        
        return false;
        
    }
}