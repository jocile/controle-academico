<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Selecione o aluno e o curso:</h4>
    </div>
    <div class="card-body">
      <form action="database/matricula_de_cursos.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Aluno(a):</span>
          <select name="aluno" id="aluno" class="form-select" required>
            <option value="">Selecione o aluno(a)</option>
            <?php
            // Conexão com o banco de dados
            require("database/conexao.php");

            // Consulta para obter os alunos
            $query = "SELECT id, nome FROM alunos ORDER BY nome";
            $result = mysqli_query($conn, $query);

            // Verifica se há resultados
            if (mysqli_num_rows($result) > 0) {
              // Loop pelos resultados e cria as opções do select
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
              }
            } else {
              echo '<option value="">Nenhum aluno encontrado</option>';
            }
            ?>
          </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Curso:</span>
          <!--<select name="curso" id="curso" class="form-select" required>
            <option value="">Selecione o curso</option>-->
            <?php
            // Conexão com o banco de dados
            require("database/conexao.php");

            // Consulta para obter os cursos
            $query = "SELECT id, nome FROM cursos ORDER BY nome";
            $result = mysqli_query($conn, $query);

            // Verifica se há resultados
            if (mysqli_num_rows($result) > 0) {
              echo '<select name="curso" class="form-select" required>';
              echo '<option value="">Selecione o Curso</option>';
              // Loop pelos resultados e cria as opções do select
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
              }
            } else {
              echo '<option value="">Nenhum curso encontrado</option>';
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conn);
            ?>
          </select>
        </div>
        <div class="card-footer text-center">
          <input type="reset" class="btn btn-secondary" value="Limpar">
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
      </form>
    </div>
  </div>
</div>