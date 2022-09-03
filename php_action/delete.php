<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-deletar'])) {
  $id = mysqli_escape_string($connect, $_POST['id']);


  $sql = "DELETE FROM clientes WHERE id = '$id'";

  if (mysqli_query($connect, $sql)) {
    $_SESSION['mensagem'] = "Excluído com sucesso!";
    header('Location: ../index.php?');
  } else {
    $_SESSION['mensagem'] = "Erro ao Excluir";
    header('Location: ../index.php?');
  }
}

if (isset($_POST['btn-deletarContato'])) {
  $idContato = mysqli_escape_string($connect, $_POST['id_contato']);
  $idCliente = mysqli_escape_string($connect, $_POST['id_cliente']);


  $sql = "DELETE FROM contatos WHERE id_contato = '$idContato'";

  if (mysqli_query($connect, $sql)) {
    $_SESSION['mensagem'] = "Excluído com sucesso!";
    header('Location: ../contatos.php?id=' . $idCliente);
  } else {
    $_SESSION['mensagem'] = "Erro ao Excluir";
    header('Location: ../contatos.php?');
  }
}
