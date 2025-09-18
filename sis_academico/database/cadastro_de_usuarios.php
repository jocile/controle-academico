<?php
// conectando ao banco de dados
require("conexao.php");

// Criando a tabela se não existir
$nomeTabela = "usuarios";
$tabela_usuarios = "CREATE TABLE IF NOT EXISTS $nomeTabela (
    id INT(10) AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR (50) NOT NULL,
    senha VARCHAR(50) NOT NULL,
    tipo_usuario INT(1) NOT NULL
    )";
if ($conn->query($tabela_usuarios)) {
  echo "<script>alert('Tabela $nomeTabela já criada com sucesso.');</script>";
} else {
  echo "<script>alert('Erro ao criar a tabela: " . $conn->error . "');</script>";
}

// Incluindo os dados do formulario
$usuario = trim($_POST["usuario"]);
$senha = md5(trim($_POST["senha"]));
$tipo_usuario = $_POST["tipo_usuario"];

// Inserção dos dados na tabela
$inserir = "INSERT INTO usuarios (usuario, senha, tipo_usuario) VALUES ('$usuario', '$senha', '$tipo_usuario')";
if (mysqli_query($conn, $inserir)) {
  echo "<script>alert('Usuário cadastrado com sucesso!');</script>";
  print "<script>setTimeout(function(){ location.href='../index.php?pagina=sucesso'; }, 9000);</script>";
} else {
  echo "<script>alert('Erro ao cadastrar usuário!');</script>";
  print "<script>setTimeout(function(){ location.href='../index.php?pagina=cadastro-de-usuarios'; }, 9000);</script>";
}
mysqli_close($conn);
