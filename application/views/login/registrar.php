<style>
form{
  max-width: 330px;
  padding: 15px;
}   
</style>
<h1>Cadastrar usuário</h1>
<form role="form" action="registrar" method="post">
  <div class="form-group">
    <label for="InputNome">Nome:</label>
    <input type="text" class="form-control" name="nome" id="InputNome" placeholder="Digite seu nome">
  </div>
  <div class="form-group">
    <label for="InputAutor">E-mail:</label>
    <input type="text" class="form-control" name="email" id="InputAutor" placeholder="Digite seu e-mail">
  </div>
  <div class="form-group">
    <label for="InputPublicacao">Senha:</label>
    <input type="password" class="form-control" name="senha" id="InputPublicacao" placeholder="Digite sua senha">
  </div>    
    <input type="hidden" value="admin" name="tipo_user">
  <button type="submit" class="btn btn-default">Cadastrar</button>
</form>
