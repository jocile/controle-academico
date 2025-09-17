<?php

// Recebe os dados do formulário
if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}
$nome = $_POST["nome"];
$cpf = $_POST["cpf"];
$endereco = $_POST["endereco"];
$complemento = $_POST["complemento"];
$cep = $_POST["cep"];
$bairro = $_POST["bairro"];
$cidade = $_POST["cidade"];
$estado = $_POST["estado"];
$telefone = $_POST["telefone"];

// Conexão com o banco de dados
require("conexao.php");

// Cria a tabela se não existir
$criarTabelaAluno = "CREATE TABLE IF NOT EXISTS alunos (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        nome VARCHAR(100) NOT NULL,
        cpf VARCHAR(14) NOT NULL,
        endereco VARCHAR(255) NOT NULL,
        complemento VARCHAR(100),
        cep VARCHAR(10) NOT NULL,
        bairro VARCHAR(100) NOT NULL,
        cidade VARCHAR(100) NOT NULL,
        estado VARCHAR(2) NOT NULL,
        telefone VARCHAR(15),
        data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";
mysqli_query($conn, $criarTabelaAluno);

// Inserção dos dados na tabela
$inserir = "INSERT INTO alunos (nome, cpf, endereco, complemento, cep, bairro, cidade, estado, telefone) VALUES ('$nome', '$cpf', '$endereco', '$complemento', '$cep', '$bairro', '$cidade', '$estado', '$telefone')";
if (mysqli_query($conn, $inserir)) {
    // Fechar conexão
    mysqli_close($conn);
    // Redireciona para a página de sucesso
    header("Location: ../index.php?pagina=sucesso");
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conn);
}
mysqli_close($conn);
