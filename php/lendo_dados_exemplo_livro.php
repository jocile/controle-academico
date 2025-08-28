<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lendo a tabela</title>
</head>

<body>
  <h1>Alunos cadastrados</h1>

  <?php
  require("conexao.php");
  $consulta = "SELECT * FROM matricula";
  $resultado = $conexao->query($consulta);

  while ($alunos = $resultado->fetch_assoc()) {
    echo "N. {$alunos['id']}  Nome: {$alunos['nome']} Curso:  {$alunos['curso']}<br>";
  }
  $conexao->close();
  ?>
</body>

</html>