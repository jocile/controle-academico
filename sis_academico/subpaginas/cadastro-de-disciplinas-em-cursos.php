<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Formulário de Disciplinas em Cursos</h4>
    </div>
    <div class="card-body">
      <form action="database/cadastro_de_disciplinas_em_cursos.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Selecione o curso:</span>
          <?php
          // Conexão com o banco de dados
          require("database/conexao.php");

          // Consulta para obter os cursos
          $query = "SELECT id, nome FROM cursos ORDER BY nome";
          $result = mysqli_query($conn, $query);

          // Verifica se há resultados
          if (mysqli_num_rows($result) > 0) {
            echo '<select name="curso" class="form-select" required>';
            // echo '<option value="">Selecione o Curso</option>';
            // Loop pelos resultados e cria as opções do select
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
            }
            echo '</select>';
          } else {
            echo 'Nenhum curso encontrado.';
          }

          // Fecha a conexão com o banco de dados
          mysqli_close($conn);
          ?>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Selecione a disciplina:</span>
          <?php
          // Conexão com o banco de dados
          require("database/conexao.php");

          // Consulta para obter as disciplinas
          $query = "SELECT id, nome FROM disciplinas ORDER BY nome";
          $result = mysqli_query($conn, $query);

          // Verifica se há resultados
          if (mysqli_num_rows($result) > 0) {
            echo '<select name="disciplina" class="form-select" required>';
            // echo '<option value="">Selecione a Disciplina</option>';
            // Loop pelos resultados e cria as opções do select
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
            }
            echo '</select>';
          } else {
            echo 'Nenhuma disciplina encontrada.';
          }

          // Fecha a conexão com o banco de dados
          mysqli_close($conn);
          ?>
        </div>
        <div class="card-footer text-center">
          <input type="reset" class="btn btn-secondary" value="Limpar">
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
      </form>
    </div>
  </div>
</div>