<div class="col-md-9">
<table class="table table-striped">
<thead>
  <tr>
    <th>Livro</th>
    <th>Data Reserva</th> 
  </tr>
</thead>
<tbody>
  <?php foreach ($reservas as $reserva):?>
  <tr>
    <td><?=$reserva['Nome']?></td>
    <td><?=$reserva['DataReserva']?></td>
    <td><a href="<?=URL?>reservas/delete/<?=$reserva['idReserva']?>" class="btn btn-danger delete">Cancelar</a></td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
</div>
<?php include 'application/views/elements/deletemodal.php';?>