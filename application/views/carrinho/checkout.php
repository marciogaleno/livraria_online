<div class="jumbotron center-block">
    <h3>Carrinho de compras</h3>
<table class="table table-bordered">
    <tr>
        <th class="col-md-8">Intem</tH>
        <th>Valor</tH>
        <th>Tipo</tH>
        <th>Excluir</tH>
    </tr>
    <?php
      if (!empty($livros)):
          foreach ($livros as $id_livro => $livro):         
    ?>
            <tr>
                <td>
                    <?=$livro['nome_livro']?>
                </td>
                <td>
                    <?php echo $livro['preco_livro']?>
                </td>
                <td>
                    <?php echo ($livro['operacao'] == 1)? 'Compra' : 'Aluguel'?>
                </td>
                <td>
                    <a href="<?=URL?>carrinho/excluirIntem/<?=$id_livro?>">Excluir</a>
                </td>
            </tr>
    <?php
          endforeach;
      endif;
    ?>
</table>
    <p><a class="btn btn-primary btn-lg" href="#" role="button" style="float: right">Pagar</a></p>
</div>