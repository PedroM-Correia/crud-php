<?php
include_once 'includes/header.php';
include_once 'includes/mensagem.php';
?>

</br>
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Novo Cliente</h3>
    <form action="php_action/create.php" method="POST">
      <div>
        <div class="input-field col s6">
          <input type="text" required name="nome" id="nome" autofocus>
          <label for="nome">Nome*</label>
        </div>
        <div class="input-field col s6">
          <input minlength="5" type="text" name="apelido" id="apelido">
          <label for="apelido">Apelido</label>
        </div>
      </div>

      <div>
        <div class="input-field col s6">
          <input type="number" required name="cpf" id="cpf">
          <label for="cpf">CPF*</label>
        </div>
        <div class="input-field col s6">
          <input type="number" required name="telefone" id="telefone">
          <label for="telefone">Telefone*</label>
        </div>
      </div>

      <div class="input-field col s12">
        <input type="email" required name="email" id="email">
        <label for="email">Email*</label>
      </div>

      <div>
        <div class="input-field col s3">
          <input type="number" required name="cep" id="cep">
          <label for="cep">CEP*</label>
        </div>
        <div class="input-field col s6">
          <input type="text" required name="endereco" id="endereco">
          <label for="endereco">Endereço*</label>
        </div>
        <div class="input-field col s3">
          <input type="text" required name="numero" id="numero">
          <label for="numero">Número*</label>
        </div>
      </div>

      <div>
        <div class="input-field col s3">
          <input type="text" required name="estado" id="estado">
          <label for="estado">Estado*</label>
        </div>
        <div class="input-field col s3">
          <input type="text" required name="cidade" id="cidade">
          <label for="cidade">Cidade*</label>
        </div>
        <div class="input-field col s6">
          <input type="text" name="complemento" id="complemento">
          <label for="complemento">Complemento</label>
        </div>
      </div>

      <button class="btn" name="btn-cadastrar" type="submit">Cadastrar</button>
      <a href="index.php" class="btn green" type="submit">Voltar</a>
    </form>
  </div>
</div>


<?php
include_once 'includes/footer.php';
?>

<style>
  input[type=number]::-webkit-inner-spin-button {
    -webkit-appearance: none;

  }

  input[type=number] {
    -moz-appearance: textfield;
    appearance: textfield;

  }
</style>