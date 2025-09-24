<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Cadastro de Turma</h4>
    </div>
    <div class="card-body">
      <form action="database/cadastro_de_turmas.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Selecione a Disciplina:</span>
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
        <div class="input-group mb-3">
          <span class="input-group-text">Selecione o Professor:</span>
          <?php
          // Conexão com o banco de dados
          require("database/conexao.php");

          // Consulta para obter os professores
          $query = "SELECT id, nome FROM professores ORDER BY nome";
          $result = mysqli_query($conn, $query);

          // Verifica se há resultados
          if (mysqli_num_rows($result) > 0) {
            echo '<select name="professor" class="form-select" required>';
            // echo '<option value="">Selecione o Professor</option>';
            // Loop pelos resultados e cria as opções do select
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
            }
            echo '</select>';
          } else {
            echo 'Nenhum professor encontrado.';
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