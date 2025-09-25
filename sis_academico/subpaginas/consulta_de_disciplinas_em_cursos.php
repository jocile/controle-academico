<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Disciplinas cadastradas em cursos</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar as disciplinas cadastradas
      $consulta = "SELECT disciplinas_em_cursos.id AS id, cursos.nome AS curso_nome, disciplinas.nome AS disciplina_nome, disciplinas.carga_horaria, disciplinas.creditos
        FROM disciplinas_em_cursos
        INNER JOIN cursos ON disciplinas_em_cursos.curso_id = cursos.id
        INNER JOIN disciplinas ON disciplinas_em_cursos.disciplina_id = disciplinas.id
        ORDER BY cursos.nome, disciplinas.nome";
      $resultado = $conn->query($consulta);

      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>ID</th><th>Curso</th><th>Disciplina</th><th>Carga Horária</th><th>Créditos</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['id']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['curso_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['disciplina_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['carga_horaria']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['creditos']) . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhuma disciplina cadastrada em cursos.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>
