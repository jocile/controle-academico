<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Alunos matriculados em turmas</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar os alunos cadastrados e os cursos em que estão matriculados
      $consulta = "SELECT alunos.id AS aluno_id, alunos.nome AS aluno_nome, turmas.id AS turma_id, turmas.disciplina_id, disciplinas.id AS disciplina_id, disciplinas.nome AS disciplina_nome
        FROM alunos
        INNER JOIN alunos_turmas ON alunos.id = alunos_turmas.aluno_id
        INNER JOIN turmas ON alunos_turmas.turma_id = turmas.id
        INNER JOIN disciplinas ON turmas.disciplina_id = disciplinas.id
        ORDER BY alunos.nome";
      $resultado = $conn->query($consulta);

      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Nome do Aluno</th><th>Disciplina</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['aluno_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['disciplina_nome'] ?? 'N/A') . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhum aluno cadastrado.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>