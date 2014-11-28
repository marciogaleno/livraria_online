<table class="table table-striped">
<thead>
  <tr>
    <th>Categoria</th>
    <th>Nome</th>
    <th>Autor</th> 
    <th>Preco Venda</th>
    <th>Preco Aluguel</th>
    <th>Descrição</th>
    <th>Quant. p/Venda</th>
    <th>Quant. p/Aluguel</th>
    <th>Ações</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($livros as $livro):?>
  <tr>
    <td><?=$livro['nome_categoria']?></td>
    <td><?=$livro['Nome']?></td>
    <td><?=$livro['Autor']?></td>
    <td><?=$livro['PrecoVenda']?></td>
    <td><?=$livro['PrecoAluguel']?></td>
    <td><?=$livro['descricao']?></td>
    <td><?=$livro['Quant_venda']?></td>
    <td><?=$livro['Quant_aluguel']?></td>
    <td><a href="<?=URL?>livro/editAdmin/<?=$livro['idLivro']?>" class="btn btn-primary">Editar</a></td>
    <td><a href="<?=URL?>livro/delete/<?=$livro['idLivro']?>" class="btn btn-danger delete">Excluir</a></td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
<?php include 'application/views/elements/deletemodal.php';?>
