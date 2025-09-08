<?php
$servername = "localhost";
$username = "root";
$password = "";

// Criar conexão
$conexao = mysqli_connect($servername, $username, $password);

// Verificar conexão
if ($conexao->connect_error) {
    die('Não foi possível conectar ao Banco de Dados. Erro detectado: ' . $conexao->connect_error);
  }
?>