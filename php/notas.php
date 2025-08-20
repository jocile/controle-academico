<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Notas</title>
</head>

<body>

  <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
    <label for="nome">Nome:</label>
    <input type="text" name="nome" id="nome" required>
    <br>
    <label for="prova1">Prova 1:</label>
    <input type="number" name="prova1" id="prova1" step="0.5" min="0" max="10" required>
    <br>
    <label for="prova2">Prova 2:</label>
    <input type="number" name="prova2" id="prova2" step="0.5" min="0" max="10" required>
    <br>
    <button type="reset">Limpar</button>
    <input type="submit" value="Calcular">
  </form>

  <?php
  echo "<h1>Resultado das Provas</h1>";
  $prova1 = $_POST['prova1'];
  $prova2 = $_POST['prova2'];
  $parcial = $prova1 + $prova2;
  $media = $parcial / 2;

  echo "Parcial da soma das provas: $parcial <br>";
  echo "Média das provas: $media <br>";

  echo "O aluno " . $_POST['nome'] . " foi ";

  if ($media >= 7) {
    echo "<strong style='color: green;'>Aprovado</strong><br>";
  } else {
    echo "<strong style='color: red;'>Reprovado</strong><br>";
  }
  ?>
</body>

</html>