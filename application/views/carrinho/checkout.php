<div class="jumbotron center-block">
    <h3>Carrinho de compras</h3>
<table class="table table-bordered">
    <tr>
        <th>Tipo</tH>
        <th class="col-md-8">Intem</tH>
        <th>Quant.</tH>
        <th>Valor</tH>
        <th>Excluir</tH>
    </tr>
    <?php
      if (!empty($livros)):
          $valor_total = 0;
          foreach ($livros as $id_livro => $livro):         
    ?>
            <tr>
                <td>
                    <?php echo ($livro['operacao'] == 1)? 'Compra' : 'Aluguel'?>
                </td>
                <td>
                    <?=$livro['nome_livro']?>
                </td>
                <td>
                    <?php echo $livro['quant']?>
                </td>
                <td>
                    <?php echo $livro['preco_livro']?>
                    <?php $valor_total +=$livro['preco_livro']?>
                </td>
                <td>
                    <a href="<?=URL?>carrinho/excluirIntem/<?=$id_livro?>">Excluir</a>
                </td>
            </tr>
    <?php
          endforeach;
      
    ?>
            <tr>
                <td colspan="3"><p style="float:right">Valor total</p></td>
                <td colspan="2"><p>R$ <?=$valor_total ?></p></td>
            </tr>
        <?php endif;?>
</table>
    <a class="btn btn-primary btn-lg" href="<?=URL?>carrinho/pagar" role="button" style="float: right">Pagar</a>
    <p><a class="btn btn-default btn-lg" href="<?=URL?>" role="button" style="float: right; margin-right: 10px">Continuar Comprando</a></p>
</div>