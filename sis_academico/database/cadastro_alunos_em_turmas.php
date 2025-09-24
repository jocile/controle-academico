<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}
$aluno_id = $_POST["aluno"];
$turma_id = $_POST["turma"];

// Conexão com o banco de dados
require("conexao.php");
// Cria a tabela se não existir
$criarTabelaMatriculas = "CREATE TABLE IF NOT EXISTS alunos_turmas (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        aluno_id INT(6) UNSIGNED NOT NULL,
        turma_id INT(6) UNSIGNED NOT NULL,
        data_matricula TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (aluno_id) REFERENCES matriculas(id),
        FOREIGN KEY (turma_id) REFERENCES turmas(id)
    )";
if ($conn->query($criarTabelaMatriculas ) === false) {
    echo "Erro ao criar a tabela: " . $conn->error;
}
// Inserção dos dados na tabela
$inserir = "INSERT INTO alunos_turmas (aluno_id, turma_id) VALUES ('$aluno_id', '$turma_id')";
if ($conn->query($inserir)) {
    // Fechar conexão
    mysqli_close($conn);
    // Redireciona para a página de sucesso
    header("Location: ../index.php?pagina=sucesso");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
} 
mysqli_close($conn);
