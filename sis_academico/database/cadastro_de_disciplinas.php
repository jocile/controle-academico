<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}

$nome_disciplina = $_POST["nome"];
$carga_horaria = $_POST["carga_horaria"];
$creditos = $_POST["creditos"];
$ementa = $_POST["ementa"];


// Conexão com o banco de dados
require("conexao.php");

// Criando a tabela se não existir
$tabela_cursos = "CREATE TABLE IF NOT EXISTS disciplinas (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    carga_horaria INT(6) NOT NULL,
    creditos INT(6) NOT NULL,
    ementa TEXT,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

if ($conn->query($tabela_cursos) === false) {
    echo "<script>alert('Erro ao criar a tabela: " . $conn->error . "');</script>";
}

// Insere os dados na tabela de disciplinas
$query = "INSERT INTO disciplinas (nome, carga_horaria, creditos, ementa) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("siis", $nome_disciplina, $carga_horaria, $creditos, $ementa);  
if ($stmt->execute()) {
    // Redireciona para a página de sucesso
    header("Location: ../index.php?pagina=sucesso");
} else {
    echo "<script>alert('Erro ao cadastrar disciplina!'. $stmt->error);</script>";
    print "<script>setTimeout(function(){ location.href='../index.php?pagina=cadastro-de-disciplinas'; }, 9000);</script>";
}
// Fecha a conexão
$stmt->close(); 
$conn->close();
