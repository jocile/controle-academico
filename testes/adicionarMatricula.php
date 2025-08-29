<?php
// Include config file
require_once "../backend/conexao.php";

// Define variables and initialize with empty values
$name = $curso = "";
$name_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Validate name
  $input_name = trim($_POST["name"]);
  if (empty($input_name)) {
    $name_err = "Por favor entre com nome e sobrenome.";
  //} elseif (!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options" => array("regexp" => "/^[a-zA-Z\s]+$/")))) {
  //  $name_err = "Por favor entre com um nome válido.";
  } else {
    $name = $input_name;
  }

  // Validate curso
  $input_curso = trim($_POST["curso"]);
  if (empty($input_curso)) {
    $curso_err = "Please enter a curso.";
  } else {
    $curso = $input_curso;
  }

  // Check input errors before inserting in database
  if (empty($name_err) && empty($curso_err)) {
    // Prepare an insert statement
    $sql = "INSERT INTO matricula (nome, curso) VALUES (?, ?)";

    if ($stmt = mysqli_prepare($conexao, $sql)) {
      // Bind variables to the prepared statement as parameters
      mysqli_stmt_bind_param($stmt, "ss", $param_name, $param_curso);

      // Set parameters
      $param_name = $name;
      $param_curso = $curso;

      // Attempt to execute the prepared statement
      if (mysqli_stmt_execute($stmt)) {
        // Records created successfully. Redirect to landing page
        header("location: crudMatricula.php");
        exit();
      } else {
        echo "Oops! Something went wrong. Please try again later.";
      }
    }

    // Close statement
    mysqli_stmt_close($stmt);
  }

  // Close connection
  mysqli_close($conexao);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Create Record</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <style>
    .wrapper {
      width: 600px;
      margin: 0 auto;
    }
  </style>
</head>

<body>
  <div class="wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <h2 class="mt-5">Adicionar matrícula</h2>
          <p>Por favor, preencha este formulário e envie para adicionar um registro de matrícula ao banco de dados.</p>
          <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
              <label>Nome</label>
              <input type="text" name="name" class="form-control <?php echo (!empty($name_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $name; ?>">
              <span class="invalid-feedback"><?php echo $name_err; ?></span>
            </div>
            <div class="form-group">
              <label>Curso</label>
              <input type="text" name="curso" class="form-control <?php echo (!empty($curso_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $curso; ?>">
              <span class="invalid-feedback"><?php echo $curso_err; ?></span>
            </div>
            <input type="submit" class="btn btn-primary" value="Salvar">
            <a href="index.php" class="btn btn-secondary ml-2">Cancelar</a>
          </form>
        </div>
      </div>
    </div>
  </div>
</body>

</html>