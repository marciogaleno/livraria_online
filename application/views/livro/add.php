<h1>Cadastrar Produto</h1>
<form role="form" action="add" method="post" enctype="multipart/form-data">
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
    <input type="text" class="form-control" name="Nome" id="InputNome" placeholder="Digite o nome do livro">
  </div>
  <div class="form-group">
    <label for="InputAutor">Autor:</label>
    <input type="text" class="form-control" name="Autor" id="InputAutor" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPublicacao">Ano de publicação:</label>
    <input type="number" class="form-control" name="AnoPublicacao" id="InputPublicacao" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoVenda">Preço venda:</label>
    <input type="number" class="form-control" id="InputPrecoVenda" name="PrecoVenda" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoAluguel">Preço aluguel:</label>
    <input type="number" class="form-control" id="InputPrecoAluguel" name="PrecoAluguel" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoDescricao">Descrição:</label>
    <input type="text" class="form-control" id="InputPrecoDescricao" name="descricao"placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputQuant">Quantidade Venda:</label>
    <input type="number" class="form-control" id="InputQuant" name="Quant_venda" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputQuant">Quantidade Aluguel:</label>
    <input type="number" class="form-control" id="InputQuant" name="Quant_aluguel" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputQuant">Imagem Livro:</label>
    <input type="file" class="form-control" id="InputQuant" name="imagem" placeholder="Digite o nome do autor">
  </div>
    
  <button type="submit" class="btn btn-default">Submit</button>
</form>
