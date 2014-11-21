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

<form role="form" action="addPessoaFisica" method="post">
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
    <input type="text" class="form-control" name="RG" id="InputPublicacao" placeholder="Digite o seu rg">
  </div>
  <div class="form-group">
    <label for="InputPrecoVenda">DataNascimento:</label>
    <input type="text" class="form-control" id="InputPrecoVenda" name="DataNascimento" placeholder="Digite a sua data de nascimento">
  </div>
  <div class="form-group">
    <label for="InputPrecoReserva">Endereço:</label>
    <input type="text" class="form-control" id="InputPrecoReserva" name="EnderecoCli" placeholder="Digite o nome do autor">
  </div>
  <div class="form-group">
    <label for="InputPrecoDescricao">Telefone:</label>
    <input type="text" class="form-control" id="InputPrecoDescricao" name="TelefoneCli"placeholder="Digite o nome do autor">
  </div>
    <h3>Dados de usuário</h3>
  <div class="form-group">
    <label for="InputQuant">E-mail:</label>
    <input type="text" class="form-control" id="InputQuant" name="EmailCli" placeholder="Digite o e-mail">
  </div>  
  <div class="form-group">
    <label for="InputPublicacao">Senha:</label>
    <input type="password" class="form-control" name="senha" id="InputPublicacao" placeholder="Digite sua senha">
  </div>    
    <input type="hidden" value="admin" name="tipo_user">
  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
