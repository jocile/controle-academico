<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  die("Acesso inválido.");
}

$disciplina_id = $_POST["disciplina"];
$professor_id = $_POST["professor"];

// Conexão com o banco de dados
require("conexao.php");

// Criando a tabela se não existir
$tabela_turmas = "CREATE TABLE IF NOT EXISTS turmas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    disciplina_id INT(6) UNSIGNED NOT NULL,
    professor_id INT(6) UNSIGNED NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas(id),
    FOREIGN KEY (professor_id) REFERENCES professores(id)
    )";

if ($conn->query($tabela_turmas) === false) {
  echo "<script>alert('Erro ao criar a tabela: " . $conn->error . "');</script>";
}

// Insere os dados na tabela de turmas
$query = "INSERT INTO turmas (disciplina_id, professor_id) VALUES (?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $disciplina_id, $professor_id);

if ($stmt->execute()) {
  // Redireciona para a página de sucesso
  header("Location: ../index.php?pagina=sucesso");
} else {
  echo "<script>alert('Erro ao cadastrar turma: " . $stmt->error . "');</script>";
  print "<script>setTimeout(function(){ location.href='../index.php?pagina=cadastro-de-turmas'; }, 9000);</script>";
}

$stmt->close();
$conn->close();