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
mysqli_select_db($conexao, "sis_academico");

// Cria a tabela se não existir
$criarTabela = "CREATE TABLE IF NOT EXISTS alunos (
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
mysqli_query($conexao, $criarTabela);

// Inserção dos dados na tabela
$inserir = "INSERT INTO alunos (nome, cpf, endereco, complemento, cep, bairro, cidade, estado, telefone) VALUES ('$nome', '$cpf', '$endereco', '$complemento', '$cep', '$bairro', '$cidade', '$estado', '$telefone')";
if (mysqli_query($conexao, $inserir)) {
    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

// Fechar conexão
mysqli_close($conexao);
