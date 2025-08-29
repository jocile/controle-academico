<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Teste de conexão ao Banco de Dados MySQL</title>
</head>

<body>
  <h1>Teste de conexão ao Banco de Dados MySQL</h1>
  <?php
  // Estabelecendo a conexão
  $conexao = mysqli_connect("localhost", "root", "");
  if ($conexao->connect_error) {
    die('Não foi possível conectar ao Banco de Dados. Erro detectado: ' . $conexao->connect_error);
  }
  echo "Conexão bem-sucedida ao MySQL!<br>";

  // Criando o banco de dados
  $banco = "CREATE DATABASE IF NOT EXISTS sis_academico";
  if ($conexao->query($banco)) {
    echo "Banco de dados 'sis_academico' criado com sucesso.<br>";
  } else {
    echo "Erro ao criar banco de dados: " . $conexao->error;
  }

  // Criando a tabela
  $tabela_matricula = "CREATE TABLE IF NOT EXISTS matricula (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR (50) NOT NULL,
    curso VARCHAR(50) NOT NULL 
    )";
  $conexao->select_db("sis_academico");
  if ($conexao->query($tabela_matricula)) {
    echo "Tabela 'matricula' criada com sucesso.<br>";
  } else {
    echo "Erro ao criar a tabela: " . $conexao->error;
  }

  // inserir dados na tabela
  $inserir_dados = "INSERT INTO matricula (nome, curso) VALUES
    ('Fco Ant', 'Programador'),
    ('Lucas', 'Web designer'),
    ('João', 'Programador')";
  if ($conexao->query($inserir_dados)) {
    echo "Dados inseridos com sucesso.";
  } else {
    echo "Erro ao inserir dados: " . $conexao->error;
  }

  $conexao->close();
  ?>
</body>

</html>