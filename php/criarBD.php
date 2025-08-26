<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste de conexão ao MySQL</title>
</head>

<body>
  <h1>Criando a tabela no MySQL</h1>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";

  // Criar conexão
  $conn = new mysqli($servername, $username, $password);

  // Verificar conexão
  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }
  echo "Conexão bem-sucedida ao MySQL!";

  function criarBanco($conn, $dbname)
  {
    $sql = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql) === TRUE) {
      echo "Banco de dados '$dbname' criado com sucesso ou já existe.<br>";
    } else {
      echo "Erro ao criar banco de dados: " . $conn->error . "<br>";
    }
  }

  criarBanco($conn, 'sis_academico');

  $conn->close();
  ?>
</body>
</html>