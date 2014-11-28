<h1>Editar Produto</h1>
<form role="form" action="editAdmin" method="post" enctype="multipart/form-data">
    <input type="hidden" value="<?=$livro['idLivro']?>" name="idLivro">
  <div class="form-group">
    <label for="InputNome">Categoria:</label>
    <select class="form-control" name="categoria_id" id="InputNome" placeholder="Digite o nome do livro">
        <?php foreach ($categorias as $categoria):?>
            <option value="<?=$categoria['idCategoria']?>"><?=$categoria['nome']?></option>
        <?php endforeach;?>
    </select>
  </div>
  <div class="form-group">
    <label for="InputNome">Nome:</label>
    <input type="text" class="form-control" name="Nome" id="InputNome" value="<?=$livro['Nome']?>" placeholder="Digite o nome do livro">
  </div>
  <div class="form-group">
    <label for="InputAutor">Autor:</label>
    <input type="text" class="form-control" name="Autor" id="InputAutor" value="<?=$livro['Autor']?>" placeholder="Digite o nome do autor" >
  </div>
  <div class="form-group">
    <label for="InputPublicacao">Ano de publicação:</label>
    <input type="number" class="form-control" name="AnoPublicacao" id="InputPublicacao" placeholder="Digite o nome do autor" value="<?=$livro['AnoPublicacao']?>">
  </div>
  <div class="form-group">
    <label for="InputPrecoVenda">Preço venda:</label>
    <input type="number" class="form-control" id="InputPrecoVenda" name="PrecoVenda" value="<?=$livro['PrecoVenda']?>" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoAluguel">Preço aluguel:</label>
    <input type="number" class="form-control" id="InputPrecoAluguel" name="PrecoAluguel"  value="<?=$livro['PrecoAluguel']?>"  placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoDescricao">Descrição:</label>
    <input type="text" class="form-control" id="InputPrecoDescricao" name="descricao" value="<?=$livro['descricao']?>" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputQuant">Quantidade Vender:</label>
    <input type="number" class="form-control" id="InputQuant" name="Quant_venda"  value="<?=$livro['Quant_venda']?>" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputQuant">Quantidade alugar:</label>
    <input type="number" class="form-control" id="InputQuant" name="Quant_aluguel"  value="<?=$livro['Quant_aluguel']?>" placeholder="Digite o nome do autor">
  </div>
 <div class="form-group">
    <label for="InputQuant">Imagem Livro:</label>
    <input type="file" class="form-control" id="InputQuant" name="imagem" placeholder="Digite o nome do autor">
  </div>    
  <button type="submit" class="btn btn-default">Submit</button>
</form>