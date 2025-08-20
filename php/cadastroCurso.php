<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>
  <?php
  $nome = $_POST['aluno'];
  $curso = $_POST['curso'];

  echo "<h1>Confira os seus dados</h1>";

  echo "<h2>Usando echo</h2>";
  echo "Nome: $nome <br>";
  echo 'Curso: ' . $curso . '<br>';

  print("<h2>Usando print</h2>");
  print("Nome: $nome <br>");
  print('Curso: ' . $curso . '<br>');

  echo "<h2>Usando var_dump</h2>";
  var_dump($nome);
  var_dump($curso);
  /*
  echo "<h2>Usando foreach</h2>";
  foreach ($aluno as $a) {
    echo "Aluno: $a <br>";
  }
  foreach ($curso as $c) {
    echo "Curso: $c <br>";
  }
*/
  ?>

</body>

</html>