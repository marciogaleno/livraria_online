<table class="table table-striped">
<thead>
  <tr>
    <th>Nome</th>
    <th>Autor</th> 
    <th>Preco Venda</th>
    <th>Preco Aluguel</th>
    <th>Preco Reserva</th>
    <th>Descrição</th>
    <th>Quantidade</th>
    <th>Ações</th>
  </tr>
</thead>
<tbody>
  <?php foreach ($livros as $livro):?>
  <tr>
    <td><?=$livro['Nome']?></td>
    <td><?=$livro['Autor']?></td>
    <td><?=$livro['PrecoVenda']?></td>
    <td><?=$livro['PrecoAluguel']?></td>
    <td><?=$livro['PrecoReserva']?></td>
    <td><?=$livro['descricao']?></td>
    <td><?=$livro['Quantidade']?></td>
    <td><a href="<?=URL?>livro/editAdmin/<?=$livro['idLivro']?>" class="btn btn-primary">Editar</a></td>
    <td><a href="<?=URL?>livro/delete/<?=$livro['idLivro']?>" class="btn btn-danger delete">Excluir</a></td>
  </tr>
  <?php endforeach;?>
</tbody>
</table>
