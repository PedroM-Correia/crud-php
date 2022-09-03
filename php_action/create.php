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

if (isset($_POST['btn-cadastrar'])) {
  $erros = array();

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

  if (!$cpf = filter_input(INPUT_POST, 'cpf', FILTER_VALIDATE_INT)) {
    $erros[] = "CPF inválido, adicione apenas números";
  }

  if (!$telefone = filter_input(INPUT_POST, 'telefone', FILTER_VALIDATE_INT)) {
    $erros[] = "Telefone inválido, adicione apenas números";
  }

  if (!$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL)) {
    $erros[] = "Email inválido";
  }

  if (!$cep = filter_input(INPUT_POST, 'cep', FILTER_VALIDATE_INT)) {
    $erros[] = "CEP inválido, adicione apenas números";
  }

  if (!$numero = filter_input(INPUT_POST, 'numero', FILTER_VALIDATE_INT)) {
    $erros[] = "numero da residência inválido, adicione apenas números";
  }


  if (!empty($erros)) {
    foreach ($erros as $erro) {
      $_SESSION['mensagem'] = $erro;
      header('Location: ../adicionar.php?');
    }
  } else {
    $sql = "INSERT INTO clientes (nome, apelido, cpf, telefone, email, cep, endereco, estado, complemento, cidade, numero)
    VALUES ('$nome', '$apelido', '$cpf', '$telefone', '$email', '$cep','$endereco', '$estado', '$complemento', '$cidade', '$numero')";
    if (mysqli_query($connect, $sql)) {
      $_SESSION['mensagem'] = "Cadastrado com sucesso!";
      header('Location: ../index.php?');
    }
  }
}
