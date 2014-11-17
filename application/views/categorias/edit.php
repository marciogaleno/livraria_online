<h1>Editar Categoria</h1>
<form role="form" action="edit" method="post">
    <input type="hidden" value="<?=$categoria['idCategoria']?>" name="idCategoria">
  <div class="form-group">
    <label for="InputNome">Nome:</label>
    <input type="text" class="form-control" name="nome" id="InputNome" value="<?=$categoria['nome']?>" placeholder="Digite o nome do livro">
  </div>
  <button type="submit" class="btn btn-default">Salvar</button>
</form>