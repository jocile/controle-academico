<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste de conexão ao MySQL</title>
</head>

<body>
  <h1>Teste de conexão ao MySQL</h1>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "teste2";

  // Criar conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar conexão
  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }
  echo "Conexão bem-sucedida ao MySQL!"; 

  $conn->close();
  ?>
</body>

</html>