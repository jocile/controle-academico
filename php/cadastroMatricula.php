<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de matrícula</title>
</head>

<body>
  <h1>Cadastro de matrícula</h1>

  <?php
  $nome = $_POST['aluno'];
  $curso = $_POST['curso'];
  echo "Recebido o aluno: $nome e curso: $curso<br>";
  require_once 'conexao.php';
  $inserir = "INSERT INTO matricula (nome, curso) VALUES ('$nome', '$curso')";
  if ($conexao->query($inserir)) {
    echo "Matrícula do aluno: $nome no curso: $curso cadastrada com sucesso!";
  } else {
    echo "Erro ao cadastrar matrícula: " . $conexao->error;
  }
  $conexao->close();
  ?>
  <p></p>
  <p><button onclick="window.location.href='matricula.html'">Cadastrar outro aluno</button>
  <button onclick="window.location.href='lendo_dados_exemplo_livro.php'">Mostrar alunos cadastrados</button>
  </p>

</body>

</html>