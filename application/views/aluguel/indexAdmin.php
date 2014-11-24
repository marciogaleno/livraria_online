
<table class="table table-striped">
<thead>
  <tr>
    <th>Livro</th>
    <th>Autor</th> 
    <th>Preco Aluguel</th>
    <th>Data Saída</th>
    <th>Data Devolução</th>
    <th>Multa</th>
    <th>Nome Cliente</th>
    <th>CPF/CNPJ</th>
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
    <td><?=$aluguel['DataDevolucao']?></td>
    <td><?=$aluguel['ValorMulta']?></td>
    <td><?=$aluguel['NomeCliente']?></td>
    <td><?=$aluguel['CPF']?></td>
    <?php if ($aluguel['ValorMulta'] > 0){ ?>
      <td><h6><b>Livro com multa. Por favor, Comparecer a livraria.</b></h6></td>
    <?php }else{?>
    <td><a href="<?=URL?>aluguel/renovar/<?=$aluguel['idAluga']?>" class="btn btn-primary">Renovar</a></td>
    <?php }?>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
