<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Coordenadores cadastrados em cursos</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar as disciplinas cadastradas
      $consulta = "SELECT cursos.id AS curso_id, cursos.nome AS curso_nome, cursos.coordenador, cursos.duracao, cursos.nivel, cursos.modalidade, professores.id AS professor_id, professores.nome AS coordenador_nome
        FROM cursos
        INNER JOIN professores ON cursos.coordenador = professores.id
        ORDER BY coordenador_nome";
      $resultado = $conn->query($consulta);
      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Coordenador</th><th>Curso</th><th>Duração</th><th>Nível</th><th>Modalidade</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['coordenador_nome'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['curso_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['duracao']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['nivel']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['modalidade']) . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhum coordenador cadastrado em cursos.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>