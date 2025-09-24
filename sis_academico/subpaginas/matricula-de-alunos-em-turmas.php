<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Selecione o aluno e a turma:</h4>
    </div>
    <div class="card-body">
      <form action="database/cadastro_alunos_em_turmas.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Aluno(a):</span>
          <select name="aluno" id="aluno" class="form-select" required>
            <option value="">Matrícula: n. - aluno(a)</option>
            <?php
            // Conexão com o banco de dados
            require("database/conexao.php");

            // Consulta para obter os alunos
            $query = "SELECT alunos.id, alunos.nome FROM alunos
            inner join matriculas on alunos.id = matriculas.aluno_id
            ORDER BY alunos.id";
            $result = mysqli_query($conn, $query);

            // Verifica se há resultados
            if (mysqli_num_rows($result) > 0) {
              // Loop pelos resultados e cria as opções do select
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . 'Matrícula: ' .  htmlspecialchars($row['id']) . ' - ' . htmlspecialchars($row['nome']) . '</option>';
              }
            } else {
              echo '<option value="">Nenhum aluno encontrado</option>';
            }
            ?>
          </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Selecione a Turma:</span>
          <?php
          // Conexão com o banco de dados
          require("database/conexao.php");

          // Consulta para obter as turmas
          $query = "SELECT turmas.id as turma,
           turmas.disciplina_id, disciplinas.id, disciplinas.nome as dnome,
           turmas.professor_id, professores.id, professores.nome as pnome
            FROM turmas
           inner join disciplinas on turmas.disciplina_id = disciplinas.id
           inner join professores on turmas.professor_id = professores.id
           ORDER BY turmas.id";
          $result = mysqli_query($conn, $query);

          // Verifica se há resultados
          if (mysqli_num_rows($result) > 0) {
            echo '<select name="turma" class="form-select" required>';
            echo '<option value="">Disciplina - professor</option>';
            // Loop pelos resultados e cria as opções do select
            while ($row = mysqli_fetch_assoc($result)) {
              echo '<option value="' . $row['turma'] . '">' . htmlspecialchars($row['dnome']) . ' - ' . htmlspecialchars($row['pnome']) . '</option>';
            }
          } else {
            echo '<option value="">Nenhuma turma encontrada</option>';
          }
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