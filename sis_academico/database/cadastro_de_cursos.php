<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  die("Acesso inválido.");
}
$nome = $_POST["nome"];
$duracao = $_POST["duracao"];
$coordenador = $_POST["coordenador"];
$nivel = $_POST["nivel"];
$modalidade = $_POST["modalidade"];

// Conexão com o banco de dados
require("conexao.php");

// Criando a tabela se não existir
$tabela_cursos = "CREATE TABLE IF NOT EXISTS cursos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    duracao VARCHAR(20) NOT NULL,
    coordenador INT(6) UNSIGNED NOT NULL,
    nivel VARCHAR(50),
    modalidade VARCHAR(50) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (coordenador) REFERENCES professores(id)
    )";

if ($conn->query($tabela_cursos) === false) {
  echo "<script>alert('Erro ao criar a tabela: " . $conn->error . "');</script>";
}

// Insere os dados na tabela de cursos
$query = "INSERT INTO cursos (nome, duracao, coordenador, nivel, modalidade) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("sssss", $nome, $duracao, $coordenador, $nivel, $modalidade);

if ($stmt->execute()) {
  // Redireciona para a página de sucesso
  header("Location: ../index.php?pagina=sucesso");
} else {
  echo "<script>alert('Erro ao cadastrar curso!'. $stmt->error);</script>";
  print "<script>setTimeout(function(){ location.href='../index.php?pagina=cadastro-de-cursos'; }, 9000);</script>";
}

// Fecha a conexão
$stmt->close();
$conn->close();
