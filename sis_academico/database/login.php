<?php
// Conexão com o banco de dados
require("conexao.php");
mysqli_select_db($conexao, "sis_academico");

if(empty($_POST['usuario']) || empty($_POST['senha'])) {
    header('Location: index.php');
    exit();
} 

// Cria a tabela se não existir
$criarTabela = "CREATE TABLE IF NOT EXISTS usuarios (
        usuario_id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        usuario_nome VARCHAR(10) NOT NULL,
        senha VARCHAR(12) NOT NULL
    )";
mysqli_query($conexao, $criarTabela);

$usuario = mysqli_real_escape_string($conexao, $_POST['usuario']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "SELECT usuario_id, usuario_nome FROM usuarios WHERE usuario_nome = '{$usuario}' and senha = md5('{$senha}')";

$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);

exit;

if($row == 1){
    $_SESSION['usuario'] = $usuario;
    header('Location: painel.php');
    exit();
}else{
    $_SESSION['nao autenticado'] = true;
    header('Location: index.php');
    exit();
}

?>