<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sisacademico";

// Criar conexão
$conn = mysqli_connect($servername, $username, $password);

// Verificar conexão
if ($conn->connect_error) {
    die('Não foi possível conectar ao Banco de Dados. Erro detectado: ' . $conn->connect_error);
  }

// Criando o banco de dados se não existir
require("criarBanco.php");
criarBanco($conn, $database);

// Selecionando o banco de dados
mysqli_select_db($conn, $database);
