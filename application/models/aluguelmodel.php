<?php
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class AluguelModel
{
    private $db;
    
    public function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
    
    public function getAll()
    {
        $sql = 'SELECT * FROM Aluga as a
               INNER JOIN livro as l ON l.idLivro = a.Livro_idLivro 
               WHERE a.Cliente_idCliente = :Cliente_idCliente';
        
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->bindValue(':Cliente_idCliente', $_SESSION['cliente_id'], PDO::PARAM_INT);
        
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function getAllAdmin()
    {
        $sql = 'SELECT a.*, l.*,c.*, pf.Nome as NomeCliente, pf.CPF  FROM Aluga as a
               INNER JOIN livro as l ON l.idLivro = a.Livro_idLivro 
               INNER JOIN cliente as c ON c.idCliente = a.Cliente_idCliente 
               LEFT JOIN pessoafisica as pf ON pf.Cliente_idCliente = c.idCliente 
               LEFT JOIN pessoajuridica as pj ON pj.Cliente_idCliente = c.idCliente';
        
        $query = $this->db->prepare($sql);
        
        $query->execute();
        
        return $query->fetchAll();
    }
    
    public function renovar($id_aluga)
    {
        $sql = "UPDATE Aluga SET
               DataPrevistaEntrega = :DataPrevistaEntrega
               WHERE idAluga = :idAluga";

        $query = $this->db->prepare($sql);

        $query->bindValue(':DataPrevistaEntrega', date('y/m/d', strtotime("+13 days")));
        $query->bindValue(':idAluga', $id_aluga);
        
        if ($query->execute()) {
            return true;
        }
        
        return false;
    }
    
    public function devolver($id_aluga)
    {

        $sql = "UPDATE Aluga SET
               DataDevolucao = :DataDevolucao
               WHERE idAluga = :idAluga";
        
        $query = $this->db->prepare($sql);

        $query->bindValue(':DataDevolucao', date('Y/m/d'));
        $query->bindValue(':idAluga', $id_aluga);
        
        if ($query->execute()) {
            return true;
        }
        
        return false;
    }

    public function get($id)
    {
        $sql = "SELECT * FROM Aluga as a
                INNER JOIN livro as l ON l.idLivro = a.IdAluga
                WHERE a.idAluga={$id}";
                
        $query = $this->db->prepare($sql);
             //var_dump($livros); die;
        $query->execute();
        
        $aluguel = $query->fetchAll();
        
        return reset($aluguel);
    } 
    
    function isReserva($livro_id)
    {
        $sql = 'SELECT * FROM reserva as r 
               INNER JOIN livro as l ON l.idLivro = r.Livro_idLivro 
               WHERE r.Livro_idLivro = :Livro_idLivro';

        $query = $this->db->prepare($sql); 
       //echo $_SESSION['cliente_id']; die;
        $query->bindValue(':Livro_idLivro',$livro_id);

        $query->execute();
        
        if ($query->rowCount()){
            return true;
        }
        
        return false;
    }
    
   function livrosNaoDevolvidos()
   {
        $sql = 'SELECT * FROM Aluga as a
               INNER JOIN livro as l ON l.idLivro = a.Livro_idLivro 
               WHERE a.DataPrevistaEntrega < :data_atual OR a.DataDevolucao >  a.DataPrevistaEntrega';
        
         $query = $this->db->prepare($sql); 
         
         $query->bindValue(':data_atual', date('y/m/d'));
         
         $query->execute();
             
         return $query->fetchAll();
   }
   
   function aplicaMulta($aluguel_id, $data_prevista_entrega, $data_devolucao)
   {  
       
       // Caso não tenha devolvido ainda, a data para o cálculo será da data prevista de entrega a data atual
       if (empty($data_devolucao)) {
          $multa = $this->calculaMulta($data_prevista_entrega, date('y-m-d'));
       } else { // caso tenha devoldido, o cálculo será da data prevista de entrega a data de devolucao
          $multa = $this->calculaMulta($data_prevista_entrega, $data_devolucao);
       }
    
       
       //echo $multa; die;
       
        $sql = "UPDATE Aluga SET
               ValorMulta = :ValorMulta 
               WHERE idAluga = :idAluga";     
        
        $query = $this->db->prepare($sql); 
        // die($multa); die;
        $query->bindValue(':idAluga',$aluguel_id);
        $query->bindValue(':ValorMulta', $multa);
        
        if ($query->execute()){
            return true;
        }
        return false;
   }



   /**
     * Método que calcula a multa de aluguel de livros
     *
     * @param string @dataPrevistaEntrega  data prevista de entrega do livro
     * @param String @dataDevolucao        data que realmente o livro foi entregue
     * @return float
     */
    public function calculaMulta(string $dataPrevistaEntrega, string $dataDevolucao) {

  
        // variável que armazena o valor da multa cobrado por dia
        $valorMultaDia = 1.0;

        // variável que armazenará o total da multa calculada
        $totalMulta = 0.0;

        /**
         * A função strtotime retorna o timestamp de cada data, ou seja, o numero de segundo
         * desde 1970. Calcula a diferênça entre elas, o que segnifica o número de segundos que
         * o livro está em atraso.
         */
        $segundosEmAtraso = strtotime($dataPrevistaEntrega) - strtotime($dataDevolucao); 

        if ($segundosEmAtraso >= 0){
            // Transforma os segundos em dias
            $dias = $segundosEmAtraso / (60 * 60 * 24);
            // calcula o valor da multa
            $totalMulta = $valorMultaDia * $dias;
        }


        return $totalMulta;
    }



   /**
     * Método que checa se uma data está no formato americano yyyy-mm-dd
     *
     * @param string @data  data que será verificada se está no padrão americano
     * @return boolean
     */
    public function validaDataFormatoEUA(string $data)
    { 
        // A função preg_match verifica se a string da data passada como parâmetro está no padrão 
        // da expressão regular fornecida 
        if (preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $data)) {
            return true;
        }

        return false;
    }


  function add($reserva_id, $cliente_id, $livro_id, $preco_aluguel)
  {
     
        $this->db->beginTransaction();
        $query = $this->db->prepare('INSERT INTO pedidos (valor_total) VALUES (0)');
        $query->execute();
        
        $pedido_id = $this->db->lastInsertId();
        
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
        
        $query = $this->db->prepare($sql);
        
        $query->bindValue(':pedido_id', $pedido_id, PDO::PARAM_INT);
        $query->bindValue(':DataAluguel', date("y/m/d"), PDO::PARAM_STR);
        $query->bindValue(':ValorAluguel', (float)$preco_aluguel);
        $query->bindValue(':ValorMulta',(float)0.0);
        $query->bindValue(':DataDevolucao', date('y/m/d', strtotime("+13 days")),  PDO::PARAM_STR);
        $query->bindValue(':Cliente_idCLiente', $cliente_id, PDO::PARAM_INT);
        $query->bindValue(':Livro_idLivro', $livro_id, PDO::PARAM_INT);  
        
        if ($query->execute()){
            
            $sql = "DELETE FROM reserva WHERE idReserva = :idReserva";            
            $stm = $this->db->prepare($sql);
            $stm->bindValue(':idReserva', $reserva_id, PDO::PARAM_INT);
            if ($stm->execute()){
                $this->db->commit();
                return true;               
            }

        }
        $this->db->rollback();
        return false;
  }
  
}
