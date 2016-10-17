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
        $sql = "INSERT INTO livro SET nome = :Nome, Autor = :Autor,"
                . " AnoPublicacao = :AnoPublicacao, PrecoVenda = :PrecoVenda,"
                . "PrecoAluguel = :PrecoAluguel,imagem = :imagem, "
                . "descricao = :descricao, Quant_venda = :Quant_venda, Quant_aluguel = :Quant_aluguel, "
                . "Rest_venda = :Rest_venda, Rest_aluguel = :Rest_aluguel, categoria_id = :categoria_id";
        
        $query = $this->db->prepare($sql); 
        
        $livro['PrecoVenda'] = (float)$livro['PrecoVenda'];
        $livro['categoria_id'] = $livro['categoria_id'];
        $livro['PrecoAluguel'] = (float)$livro['PrecoAluguel'];
        $livro['Quant_venda'] = (int)$livro['Quant_venda'];
        $livro['Quant_aluguel'] = (int)$livro['Quant_aluguel'];
        $livro['AnoPublicacao'] = (int)$livro['AnoPublicacao'];
        $livro['Rest_venda'] = (int)$livro['Quant_venda'];
        $livro['Rest_aluguel'] = (int)$livro['Quant_aluguel'];
        
        if (!empty($_FILES['imagem']['name']) && $_FILES['imagem']['name'] != '') {
            $livro['imagem'] =  $_FILES['imagem']['name'];
            //var_dump($_FILES['imagem']); die;
            $upload = upload::factory( DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img');

            //local host 

            // $upload = upload::factory( 'livraria_online' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img');

            $upload->file($_FILES['imagem']);
            $upload->set_filename($_FILES['imagem']['name']);


        }   
        
        if ($query->execute($livro)){

            return true;
        } 
        
        return false;
    }
    
    public function edit($livro)
    {
        $sql = "UPDATE livro SET "
                . "nome = :Nome, "
                . "Autor = :Autor,"
                . " AnoPublicacao = :AnoPublicacao, "
                . "PrecoVenda = :PrecoVenda,"
                . "PrecoAluguel = :PrecoAluguel, "
                . "descricao = :descricao,"
                . "Quant_venda = :Quant_venda,"
                . "Quant_aluguel = :Quant_aluguel, "
                . "Rest_venda = :Rest_venda, "
                . "Rest_aluguel = :Rest_aluguel, "
                . "categoria_id = :categoria_id,"
                . "imagem = :imagem "
                . "WHERE idLivro = :idLivro";
        
        $query = $this->db->prepare($sql); 
        
        
        
        $query->bindValue(':Nome', $livro['Nome'], PDO::PARAM_STR);
        $query->bindValue(':Autor', $livro['Autor'], PDO::PARAM_STR);
        $query->bindValue(':AnoPublicacao',  (int)$livro['AnoPublicacao'], PDO::PARAM_INT);
        $query->bindValue(':PrecoVenda',  (float)$livro['PrecoVenda']);
        $query->bindValue(':PrecoAluguel',  (float)$livro['PrecoAluguel']);
        $query->bindValue(':descricao', $livro['descricao'], PDO::PARAM_STR);
        $query->bindValue(':Quant_venda',  (int)$livro['Quant_venda'], PDO::PARAM_INT);
        $query->bindValue(':Quant_aluguel',  (int)$livro['Quant_aluguel'], PDO::PARAM_INT);
        $query->bindValue(':Rest_venda',  (int)$livro['Quant_venda'], PDO::PARAM_INT);
        $query->bindValue(':Rest_aluguel',  (int)$livro['Quant_aluguel'], PDO::PARAM_INT);
        $query->bindValue(':idLivro', (int)$livro['idLivro'], PDO::PARAM_INT);
        $query->bindValue(':categoria_id', (int)$livro['categoria_id'], PDO::PARAM_INT);
        
        
        if (!empty($_FILES['imagem']['name']) && $_FILES['imagem']['name'] != '') {
            $query->bindValue(':imagem', $_FILES['imagem']['name']);
        }else{           
            $livro = $this->get($livro['idLivro']);
            $query->bindValue(':imagem', $livro['imagem']);
        }
             //var_dump($_FILES['imagem']); die;
            $upload = upload::factory(
                DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img',
                $_SERVER['DOCUMENT_ROOT']);

            //localhost 

            // $upload = upload::factory(
            //    'livraria_online' . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR . 'img',
            //     $_SERVER['DOCUMENT_ROOT']);

            $upload->file($_FILES['imagem']);
            $upload->set_filename($_FILES['imagem']['name']);

            $results = $upload->upload();
            
        if ($query->execute()){

            return true;
        } 
        
        return false;
    }
    
    public function get($id)
    {
        $sql = "SELECT * FROM livro as l WHERE l.idLivro={$id}";
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();  
        
        $livro = $query->fetchAll();
        
        return reset($livro);
    }

    
    public function delete($id)
    {
        $sql = "DELETE FROM livro WHERE idLivro={$id}";
  
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        if ($query->execute()){
            return true;
        }  
        
        return false;
        
    }
            
    public function getAll()
    {
        $sql = 'SELECT l.*, c.nome as nome_categoria FROM livro as l 
                INNER JOIN categoria as c ON c.idCategoria = l.categoria_id';
        
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function getLivrosPorCategoria($categoria_id)
    {
        $sql = 'SELECT l.*, c.nome as nome_categoria FROM livro as l 
                INNER JOIN categoria as c ON c.idCategoria = l.categoria_id 
                WHERE c.idCategoria = :idCategoria';
        
        $query = $this->db->prepare($sql);
        
        $query->bindValue(':idCategoria', $categoria_id, PDO::PARAM_INT);
             //var_dump($livros); die;
        $query->execute();
        
        return $query->fetchAll();
    }
}
