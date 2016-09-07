
<table class="table table-striped">
<thead>
  <tr>
    <th>Livro</th>
    <th>Autor</th> 
    <th>Preco Aluguel</th>
    <th>Data Saída</th>
    <th>Data Prevista Entrega</th>
    <th>Data Devolução</th>
    <th>Multa</th>
    <th>Nome Cliente</th>
    <th>CPF</th>
    <th>Ações</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($alugueis as $aluguel):?>
  <tr <?php echo ($aluguel['ValorMulta'] > 0 ? 'class="danger"' : null)?>>
    <td><?=$aluguel['Nome']?></td>
    <td><?=$aluguel['Autor']?></td>
    <td><?=$aluguel['PrecoAluguel']?></td>
    <td><?=$aluguel['DataAluguel']?></td>
    <td><?=$aluguel['DataPrevistaEntrega']?></td>
    <td><?=$aluguel['DataDevolucao']?></td>
    <td><?=$aluguel['ValorMulta']?></td>
    <td><?=$aluguel['NomeCliente']?></td>
    <td><?=$aluguel['CPF']?></td>
    <td><a href="<?=URL?>aluguel/renovarAdmin/<?=$aluguel['idAluga']?>" class="btn btn-primary">Renovar</a>
    <?php if (empty($aluguel['DataDevolucao'])) {?>
    <td><a href="<?=URL?>aluguel/devolverAdmin/<?=$aluguel['idAluga']?>" class="btn btn-primary">Registrar Devolução</a></td>
    <?php } ?>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
