<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Professores cadastrados</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar os professores cadastrados e as disciplinas que lecionam
      $consulta = "SELECT professores.id AS professor_id, professores.nome AS professor_nome, turmas.id AS turma_id, turmas.professor_id AS turma_professor_id, disciplinas.id AS disciplina_id, disciplinas.nome AS disciplina_nome
        FROM professores
        LEFT JOIN turmas ON professores.id = turmas.professor_id
        LEFT JOIN disciplinas ON turmas.id = disciplina_id
        ORDER BY professores.nome";
      $resultado = $conn->query($consulta);
      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Nome do Professor</th><th>Disciplina</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['professor_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['disciplina_nome'] ?? 'N/A') . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhum professor cadastrado.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>