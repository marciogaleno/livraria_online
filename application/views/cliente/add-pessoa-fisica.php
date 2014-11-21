<h1>Cadastrar</h1>
<label>Escolha o tipo de cadastro:</label>
<ul class="nav nav-tabs">
    <li role="presentation" class="active">
        <a href="cliente/addPessoaFisica" aria-expanded="false" role="button">Pessoa Física</a>           
    </li>
    <li role="presentation">
        <a href="" aria-expanded="false" role="button">Pessoa Jurídica</a>           
    </li>
</ul>

<form role="form" action="add" method="post">
  <div class="form-group">
    <label for="InputNome">Nome:</label>
    <input type="text" class="form-control" name="Nome" id="InputNome" placeholder="Digite seu Nome">
  </div>
  <div class="form-group">
    <label for="InputAutor">CPF:</label>
    <input type="text" class="form-control" name="CPF" id="InputAutor" placeholder="Digite o seu CPF">
  </div>
  <div class="form-group">
    <label for="InputPublicacao">RG:</label>
    <input type="number" class="form-control" name="RG" id="InputPublicacao" placeholder="Digite o seu rg">
  </div>
  <div class="form-group">
    <label for="InputPrecoVenda">DataNascimento:</label>
    <input type="number" class="form-control" id="InputPrecoVenda" name="DataNascimento" placeholder="Digite a sua data de nascimento">
  </div>
  <div class="form-group">
    <label for="InputPrecoAluguel">Preço aluguel:</label>
    <input type="number" class="form-control" id="InputPrecoAluguel" name="PrecoAluguel" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoReserva">Endereço:</label>
    <input type="number" class="form-control" id="InputPrecoReserva" name="EnderecoCli" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoDescricao">Telefone:</label>
    <input type="text" class="form-control" id="InputPrecoDescricao" name="TelefoneCli"placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputQuant">E-mail:</label>
    <input type="number" class="form-control" id="InputQuant" name="EmailCli" placeholder="Digite o e-mail">
  </div>
    
  <button type="submit" class="btn btn-default">Submit</button>
</form>
