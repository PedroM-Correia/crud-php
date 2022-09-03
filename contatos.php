<?php
include_once 'includes/header.php';

include_once 'php_action/db_connect.php';

include_once 'includes/mensagem.php';
?>

</br>
<?php
$id = mysqli_escape_string($connect, $_GET['id']);
$sqlcliente = "SELECT clientes.id, clientes.nome, contatos.nome_contato, contatos.email_contato, contatos.telefone_contato
FROM clientes INNER JOIN contatos ON clientes.id = contatos.id_cliente WHERE clientes.id = $id ";
$resultadocliente = mysqli_query($connect, $sqlcliente);
$cliente = mysqli_fetch_array($resultadocliente);
?>
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Contatos do </h3>
    <h5 class="light"><?php echo $cliente['nome'] ?> </h5>
    <table class="striped centered highlight">
      <thead>
        <tr>
          <th>Nome: </th>
          <th>Telefone: </th>
          <th>Email: </th>
        </tr>
      </thead>
      <tbody>
        <?php
        $sqlcontato = "SELECT * FROM contatos WHERE id_cliente =  $id";
        $resultadocontato = mysqli_query($connect, $sqlcontato);
        while ($dados = mysqli_fetch_array($resultadocontato)) :
        ?>
          <td><?php echo $dados['nome_contato'];
              ?></td>
          <td><?php echo $dados['telefone_contato'];
              ?></td>
          <td><?php echo $dados['email_contato'];
              ?></td>
          <td><a href="#modal<?php echo $dados['id_contato']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</a></a></td>
          <div id="modal<?php echo $dados['id_contato']; ?>" class="modal">
            <div class="modal-content">
              <h4>Opa!</h4>
              <p>Tem certeza que deseja excluir este cliente?</p>
            </div>

            <div class="modal-footer">
              <form action="php_action/delete.php" method="POST">
                <input type="hidden" name="id_contato" value="<?php echo $dados['id_contato']; ?>">
                <input type="hidden" name="id_cliente" value="<?php echo $cliente['id']; ?>">
                <button type="submit" name="btn-deletarContato" class="btn red">Sim, quero deletar</button>
                <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancelar</a>
              </form>
            </div>
          </div>
          </tr>
        <?php endwhile;
        ?>
      </tbody>
    </table>
    <br>
    <a href="index.php" class="btn">Voltar</a>
  </div>
</div>


<?php
include_once 'includes/footer.php';
?>