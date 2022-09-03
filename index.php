<?php
include_once 'includes/header.php';

include_once 'php_action/db_connect.php';

include_once 'includes/mensagem.php';
?>

</br>
<div class="row">
  <div class="col s12 m6 push-m3">
    <h3 class="light">Clientes</h3>
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
        $sql = "SELECT id, apelido, nome, telefone, email FROM clientes";
        $resultado = mysqli_query($connect, $sql);
        while ($dados = mysqli_fetch_array($resultado)) :

          if ($dados['apelido'] != '') { ?>
            <tr>
              <td><?php echo $dados['apelido']; ?></td>
            <?php
          } else { ?>
            <tr>
              <td><?php echo $dados['nome']; ?></td>
            <?php
          }
            ?>
            <td><?php echo $dados['telefone'];
                ?></td>
            <td><?php echo $dados['email'];
                ?></td>
            <td><a href="editar.php?id=<?php echo $dados['id']; ?>" class="btn-floating lime darken-3"><i class="material-icons">edit</a></td>
            <td><a href="#modal<?php echo $dados['id']; ?>" class="btn-floating red modal-trigger"><i class="material-icons">delete</a></td>

            <div id="modal<?php echo $dados['id']; ?>" class="modal">
              <div class="modal-content">
                <h4>Opa!</h4>
                <p>Tem certeza que deseja excluir este cliente?</p>
              </div>
              <div class="modal-footer">
                <form action="php_action/delete.php" method="POST">
                  <input type="hidden" name="id" value="<?php echo $dados['id']; ?>">
                  <button type="submit" name="btn-deletar" class="btn red">Sim, quero deletar</button>
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
    <a href="adicionar.php" class="btn">Adicionar cliente</a>
  </div>
</div>


<?php
include_once 'includes/footer.php';
?>