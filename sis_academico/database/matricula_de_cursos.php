<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}

$aluno_id = $_POST["aluno"];
$curso_id = $_POST["curso"];

// Conexão com o banco de dados
require("conexao.php");

// Cria a tabela se não existir
$criarTabelaAluno = "CREATE TABLE IF NOT EXISTS matriculas (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        aluno_id INT(6) UNSIGNED NOT NULL,
        curso_id INT(6) UNSIGNED NOT NULL,
        data_matricula TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (aluno_id) REFERENCES alunos(id),
        FOREIGN KEY (curso_id) REFERENCES cursos(id)
    )";

if ($conn->query($criarTabelaAluno ) === false) {
    echo "Erro ao criar a tabela: " . $conn->error;
}

// Inserção dos dados na tabela
$inserir = "INSERT INTO matriculas (aluno_id, curso_id) VALUES ('$aluno_id', '$curso_id')";
if ($conn->query($inserir)) {
    // Fechar conexão
    mysqli_close($conn);
    // Redireciona para a página de sucesso
    header("Location: ../index.php?pagina=sucesso");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}