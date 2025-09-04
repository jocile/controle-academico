<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Atualizar Curso</title>
</head>
<body>
  <h1>Atualizar Curso</h1>
  

<?php
require_once('conexao.php');

$nome = $_POST['aluno'];
$novoCurso = $_POST['curso'];
$atualizar = "UPDATE matricula SET curso = '$novoCurso' WHERE nome = '$nome'";
if ($conexao->query($atualizar)) {
  echo "Curso do aluno: $nome atualizado para: $novoCurso com sucesso!";
} else {
  echo "Erro ao atualizar curso: " . $conexao->error;
}
$conexao->close();
?>
</body>
</html>