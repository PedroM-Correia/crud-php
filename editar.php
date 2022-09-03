<?php
include_once 'includes/header.php';

include_once 'php_action/db_connect.php';

include_once 'includes/mensagem.php';

if (isset($_GET['id'])) {
  $id = mysqli_escape_string($connect, $_GET['id']);
  $sql = "SELECT * FROM clientes WHERE id = '$id'";
  $resultado = mysqli_query($connect, $sql);
  $dados = mysqli_fetch_array($resultado);
}
?>

</br>
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Atualizar Cliente</h3>
    <form action="php_action/update.php" method="POST">
      <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
      <div>
        <div class="input-field col s6">
          <input type="text" name="nome" id="nome" value="<?php echo $dados['nome']; ?>">
          <label for="nome">Nome*</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="apelido" id="apelido" value="<?php echo $dados['apelido']; ?>">
          <label for="apelido">Apelido</label>
        </div>
      </div>

      <div>
        <div class="input-field col s6">
          <input type="text" name="cpf" id="cpf" value="<?php echo $dados['cpf']; ?>">
          <label for="cpf">CPF*</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="telefone" id="telefone" value="<?php echo $dados['telefone']; ?>">
          <label for="telefone">Telefone*</label>
        </div>
      </div>

      <div class="input-field col s12">
        <input type="email" name="email" id="email" value="<?php echo $dados['email']; ?>">
        <label for="email">Email*</label>
      </div>

      <div>
        <div class="input-field col s3">
          <input type="text" name="cep" id="cep" value="<?php echo $dados['cep']; ?>">
          <label for="cep">CEP*</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="endereco" id="endereco" value="<?php echo $dados['endereco']; ?>">
          <label for="endereco">Endereço*</label>
        </div>
        <div class="input-field col s3">
          <input type="text" name="numero" id="numero" value="<?php echo $dados['numero']; ?>">
          <label for="numero">Número*</label>
        </div>
      </div>

      <div>
        <div class="input-field col s3">
          <input type="text" name="estado" id="estado" value="<?php echo $dados['estado']; ?>">
          <label for="estado">Estado*</label>
        </div>
        <div class="input-field col s3">
          <input type="text" name="cidade" id="cidade" value="<?php echo $dados['cidade']; ?>">
          <label for="cidade">Cidade*</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="complemento" id="complemento" value="<?php echo $dados['complemento']; ?>">
          <label for="complemento">Complemento</label>
        </div>
      </div>

      <h4 class=" center-align light">Contatos</h4>
      <input type="hidden" name="idCliente" value="<?php echo $dados['id'] ?>">
      <div>
        <div class="input-field col s3">
          <input type="text" name="nomeContato" id="nomeContato">
          <label for="nomeContato">Nome do Contato</label>
        </div>
        <div class="input-field col s3">
          <input type="text" name="telefoneContato" id="telefoneContato">
          <label for="telefoneContato">Telefone do Contato*</label>
        </div>
        <div class="input-field col s5">
          <input type="text" name="emailContato" id="emailContato">
          <label for="emailContato">Email do Contato</label>
        </div>
        <button type="submit" name="btn-cadastrarContato" class="btn btn-secundary">+</button>
      </div>
      <button class="btn" name="btn-editar" type="submit">Atualizar</button>
      <a href="index.php" class="btn green" type="submit">Voltar</a>
      <a href="contatos.php?id=<?php echo $dados['id']; ?>" class="btn grey" type="submit">Visualizar Contatos</a>
    </form>
  </div>
</div>


<?php
include_once 'includes/footer.php';
?>