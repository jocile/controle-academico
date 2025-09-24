<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
  die("Acesso inválido.");
}
$curso_id = $_POST["curso"];
$disciplina_id = $_POST["disciplina"];

// Conexão com o banco de dados
require("conexao.php");

// Criando a tabela se não existir
$tabela_disciplinas_em_cursos = "CREATE TABLE IF NOT EXISTS disciplinas_em_cursos (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    curso_id INT(6) UNSIGNED NOT NULL,
    disciplina_id INT(6) UNSIGNED NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (curso_id) REFERENCES cursos(id),
    FOREIGN KEY (disciplina_id) REFERENCES disciplinas(id)
    )";

if ($conn->query($tabela_disciplinas_em_cursos) === false) {
  echo "<script>alert('Erro ao criar a tabela: " . $conn->error . "');</script>";
}

// Insere os dados na tabela de disciplinas em cursos
$query = "INSERT INTO disciplinas_em_cursos (curso_id, disciplina_id) VALUES (?, ?)";
$stmt = mysqli_prepare($conn, $query);
mysqli_stmt_bind_param($stmt, "ii", $curso_id, $disciplina_id);
if (mysqli_stmt_execute($stmt)) {
  // Redireciona para a página de sucesso
  header("Location: ../index.php?pagina=sucesso");
} else {
  echo "<script>alert('Erro ao cadastrar curso!'. $stmt->error);</script>";
  print "<script>setTimeout(function(){ location.href='../index.php?pagina=cadastro-de-cursos'; }, 9000);</script>";
}

// Fecha a conexão com o banco de dados
mysqli_stmt_close($stmt);
mysqli_close($conn);
