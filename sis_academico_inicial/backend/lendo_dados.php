<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alunos cadastrados</title>
</head>
<body>
  <h1>Alunos Cadastrados</h1>
  <table>
    <tr>
      <th>Nome</th>
      <th>Curso</th>
    </tr>
    <?php
    require_once 'conexao.php';
    $sql = "SELECT * FROM matricula";
    $resultado = $conexao->query($sql);
    if ($resultado->num_rows > 0) {
      while ($row = $resultado->fetch_assoc()) {
        echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["curso"] . "</td></tr>";
      }
    } else {
      echo "<tr><td colspan='2'>Nenhum aluno cadastrado.</td></tr>";
    }
    $conexao->close();
    ?>
  </table>
</body>
</html>