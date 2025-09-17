<?php
// Criando o banco de dados se não existir
function criarBanco($conexao, $nomeBanco)
{
  // Usando MySQLi
  $banco = "CREATE DATABASE IF NOT EXISTS `$nomeBanco`";
  if ($conexao->query($banco)) {
        echo "<script>alert('Banco de dados $nomeBanco já criado com sucesso!');</script>";
  } else {
    echo "<script>alert('Erro ao criar banco de dados: " . $conexao->error . "');</script>";
  }

  /* Usando PDO
  try {
    $banco = "CREATE DATABASE IF NOT EXISTS `$nomeBanco`";
    $conexao->exec($banco);
    echo "Banco de dados '$nomeBanco' já criado com sucesso.<br>";
  } catch (PDOException $erro) {
    echo "Erro ao criar banco de dados: " . $erro->getMessage();
  } */
}
