<table class="table table-striped">
<thead>
  <tr>
    <th>Nome</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($categorias as $categoria):?>
  <tr>
    <td><?=$categoria['nome']?></td>
    <td><a href="<?=URL?>categorias/edit/<?=$categoria['idCategoria']?>" class="btn btn-primary">Editar</a></td>
    <td><a href="<?=URL?>categorias/delete/<?=$categoria['idCategoria']?>" class="btn btn-danger delete">Excluir</a></td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
<?php include 'application/views/elements/deletemodal.php';?>