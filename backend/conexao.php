<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sis_academico";

// Criar conexão
$conexao = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexão
if ($conexao->connect_error) {
    die('Não foi possível conectar ao Banco de Dados. Erro detectado: ' . $conexao->connect_error);
  }
?>