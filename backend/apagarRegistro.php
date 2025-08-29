<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apagar Registro</title>
</head>
<body>
  <?php
  require_once('conexao.php');

  $nome = $_POST['aluno'];
  $apagar = "DELETE FROM matricula WHERE nome = '$nome'";
  if ($conexao->query($apagar)) {
    echo "Registro do aluno: $nome apagado com sucesso!";
  } else {
    echo "Erro ao apagar registro: " . $conexao->error;
  }
  $conexao->close();
  ?>
</body>
</html>