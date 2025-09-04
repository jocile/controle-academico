<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro de Alunos</title>
</head>

<body>
  <h1>Cadastro de alunos</h1>
  <form method="post" action="cadastroCurso.php">
    <label for="aluno">Nome:</label>
    <input type="text" name="aluno" id="aluno"><br>
    <label for="curso">Curso:</label>
    <select name="curso" id="curso">
      <option value="informatica">Informática</option>
      <option value="programador">Programador</option>
      <option value="designer">Designer</option>
    </select>
    <br><br>
    <input type="reset" value="Limpar" name="limpar">
    <input type="submit" value="Enviar" name="enviar">
  </form>

  
</body>

</html>