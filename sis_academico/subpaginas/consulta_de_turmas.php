<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Turmas cadastradas</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar os cursos cadastrados
      $consulta = "SELECT turmas.disciplina_id, turmas.id, turmas.professor_id, professores.nome AS professor_nome, disciplinas.nome AS disciplina_nome
        FROM turmas
        INNER JOIN disciplinas ON turmas.disciplina_id = disciplinas.id
        INNER JOIN professores ON turmas.professor_id = professores.id
        ORDER BY disciplinas.nome";
      $resultado = $conn->query($consulta);

      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>ID</th><th>Disciplina</th><th>Professor</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['disciplina_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['professor_nome']) . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhuma turma cadastrada.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>