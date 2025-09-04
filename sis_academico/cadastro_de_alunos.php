<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["aluno"];
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

    // Inserção dos dados na tabela
    $inserir = "INSERT INTO alunos (nome, cpf, endereco, complemento, cep, bairro, cidade, estado, telefone) VALUES ('$nome', '$cpf', '$endereco', '$complemento', '$cep', '$bairro', '$cidade', '$estado', '$telefone')";
    if (mysqli_query($conexao, $inserir)) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro ao cadastrar: " . mysqli_error($conexao);
    }

    // Fechar conexão
    mysqli_close($conexao);
}