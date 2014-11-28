<table class="table table-striped">
<thead>
  <tr>
    <th>Livro</th>
    <th>Data Reserva</th> 
    <th>Nome do Cliente</th> 
    <th>CPF/CNPJ</th> 
  </tr>
</thead>
<tbody>
   
  <?php foreach ($reservas as $reserva):?>
  <tr>
    <td><?=$reserva['NomeLivro']?></td>
    <td><?=$reserva['DataReserva']?></td>
    <td><?=$reserva['ClienteNome']?></td>
    <td><?=$reserva['CPF']?></td>

    <td><a href="<?=URL?>aluguel/add/<?=$reserva['idReserva']?>/<?=$reserva['idCliente']?>/<?=$reserva['idLivro']?>/<?=$reserva['PrecoAluguel']?>" class="btn btn-primary">Aprovar</a></td>
    <td><a href="<?=URL?>reservas/delete/<?=$reserva['idReserva']?>" class="btn btn-danger">Cancelar</a></td>

  <?php endforeach;?>
</tbody>
</table>

