<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Criar Tabela Cursos</title>
</head>

<body>
  <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "sis_academico";
  $tableName = "cursos";

  // Criar conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  // Verificar conexão
  if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
  }
  echo "Conexão bem-sucedida ao MySQL!";

  // SQL para criar tabela
  $sql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(30) NOT NULL,
      curso VARCHAR(30) NOT NULL
    )";

  if ($conn->query($sql) === TRUE) {
    echo "Tabela '$tableName' criada com sucesso.";
  } else {
    echo "Erro ao criar tabela: " . $conn->error;
  }

  $conn->close();
  ?>
</body>

</html>