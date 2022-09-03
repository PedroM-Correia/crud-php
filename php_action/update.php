<?php
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';
function protect($input)
{
  global $connect;
  //sql
  $var = mysqli_escape_string($connect, $input);
  // xss
  $var = htmlspecialchars($var);
  return $var;
}

if (isset($_POST['btn-editar'])) {
  $id = protect($_POST['id']);
  $nome = protect($_POST['nome']);
  $apelido = protect($_POST['apelido']);
  $cpf = protect($_POST['cpf']);
  $telefone = protect($_POST['telefone']);
  $email = protect($_POST['email']);
  $cep = protect($_POST['cep']);
  $estado = protect($_POST['estado']);
  $complemento = protect($_POST['complemento']);
  $endereco = protect($_POST['endereco']);
  $cidade = protect($_POST['cidade']);
  $numero = protect($_POST['numero']);


  $sql = "UPDATE clientes SET nome = '$nome', apelido = '$apelido', cpf = '$cpf', telefone = '$telefone', email = '$email',
  cep = '$cep', endereco = '$endereco', estado = '$estado', complemento = '$complemento', cidade = '$cidade', numero = '$numero' WHERE id = '$id' ";



  if (mysqli_query($connect, $sql)) {
    $_SESSION['mensagem'] = "Atualizado com sucesso!";
    header('Location: ../index.php?');
  } else {
    $_SESSION['mensagem'] = "Erro ao atualizar";
    header('Location: ../index.php?');
  }
}

if (isset($_POST['btn-cadastrarContato'])) {
  $nomeContato = mysqli_escape_string($connect, $_POST['nomeContato']);
  $telefoneContato = mysqli_escape_string($connect, $_POST['telefoneContato']);
  $emailContato = mysqli_escape_string($connect, $_POST['emailContato']);
  $idCliente = mysqli_escape_string($connect, $_POST['idCliente']);


  $sql = "INSERT INTO contatos (nome_contato, telefone_contato, email_contato, id_cliente)
  VALUES ('$nomeContato','$telefoneContato', '$emailContato', '$idCliente')";

  if (mysqli_query($connect, $sql)) {
    $_SESSION['mensagem'] = "Cadastrado com sucesso!";
    header('Location: ../editar.php?id=' . $idCliente);
  } else {
    $_SESSION['mensagem'] = "Erro ao cadastrar";
    header('Location: ../editar.php?id=' . $idCliente);
  }
}
