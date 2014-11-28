<div class="col-md-9">
<table class="table table-striped">
<thead>
  <tr>
    <th>Livro</th>
    <th>valor</th> 
    <th>Data Compra</th> 
    <th>Cliente</th> 
    <th>CPF</th> 
  </tr>
</thead>
<tbody>
  <?php foreach ($compras as $compra):?>
  <tr>
    <td><?=$compra['Nome']?></td>
    <td><?=$compra['PrecoVenda']?></td>
    <td><?=$compra['DataCompra']?></td>
    <td><?=$compra['nome_cliente']?></td>
    <td><?=$compra['CPF']?></td>

    
  </tr>
  <?php endforeach;?>
</tbody>
</table>
</div>