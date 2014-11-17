<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class LivroModel
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
    /**
     * adicona um livro
     * @param srray $data
     */
    public function add($livro)
    {
        $sql = "INSERT INTO Livro SET nome = :Nome, Autor = :Autor,"
                . " AnoPublicacao = :AnoPublicacao, PrecoVenda = :PrecoVenda,"
                . "PrecoAluguel = :PrecoAluguel, PrecoReserva = :PrecoReserva, "
                . "descricao = :descricao, Quantidade = :Quantidade";
        
        $query = $this->db->prepare($sql); 
        
        $livro['PrecoVenda'] = (float)$livro['PrecoVenda'];
        $livro['PrecoAluguel'] = (float)$livro['PrecoAluguel'];
        $livro['PrecoReserva'] = (float)$livro['PrecoReserva'];
        $livro['Quantidade'] = (int)$livro['Quantidade'];
        $livro['AnoPublicacao'] = (int)$livro['AnoPublicacao'];
        
        if ($query->execute($livro)){
            return true;
        } 
        
        return false;
    }
    
    public function edit($livro)
    {
        //echo (int)$livro['idLivro']; die;
    
        $sql = "UPDATE Livro SET "
                . "nome = :Nome, "
                . "Autor = :Autor,"
                . " AnoPublicacao = :AnoPublicacao, "
                . "PrecoVenda = :PrecoVenda,"
                . "PrecoAluguel = :PrecoAluguel, "
                . "PrecoReserva = :PrecoReserva, "
                . "descricao = :descricao,"
                . "Quantidade = :Quantidade "
                . "WHERE idLivro = :idLivro";
        
        $query = $this->db->prepare($sql); 
        
        
        
        $query->bindValue(':Nome', $livro['Nome'], PDO::PARAM_STR);
        $query->bindValue(':Autor', $livro['Autor'], PDO::PARAM_STR);
        $query->bindValue(':AnoPublicacao',  (int)$livro['AnoPublicacao'], PDO::PARAM_INT);
        $query->bindValue(':PrecoVenda',  (float)$livro['PrecoVenda']);
        $query->bindValue(':PrecoAluguel',  (float)$livro['PrecoAluguel']);
        $query->bindValue(':PrecoReserva',  (float)$livro['PrecoReserva']);
        $query->bindValue(':descricao', $livro['descricao'], PDO::PARAM_STR);
        $query->bindValue(':Quantidade',  (int)$livro['Quantidade'], PDO::PARAM_INT);
        $query->bindValue(':idLivro', (int)$livro['idLivro'], PDO::PARAM_INT);


        if ($query->execute()){
            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = "SELECT * FROM Livro as l WHERE l.idLivro={$id}";
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();  
        
        $livro = $query->fetchAll();
        
        return reset($livro);
    }
    
    public function delete($id)
    {
        $sql = "DELETE FROM Livro WHERE idLivro={$id}";
  
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();  
        
        return $query->fetchAll();
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT * FROM Livro';
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
