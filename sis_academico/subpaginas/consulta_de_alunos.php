<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Alunos cadastrados</h4>
    </div>
    <div class="card-body">


      <?php

      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar os alunos cadastrados e os cursos em que estão matriculados
      $consulta = "SELECT alunos.id AS aluno_id, alunos.nome AS aluno_nome, cursos.id AS curso_id, cursos.nome AS curso_nome
        FROM matriculas
        LEFT JOIN alunos ON matriculas.aluno_id = alunos.id
        LEFT JOIN cursos ON matriculas.curso_id = cursos.id
        ORDER BY alunos.nome";
      $resultado = $conn->query($consulta);

      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        //echo '<thead><tr><th>Nome do Aluno</th><th>Curso</th><th>Turma</th></tr></thead>';
        echo '<thead><tr><th>Nome do Aluno</th><th>Curso</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['aluno_nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['curso_nome'] ?? 'N/A') . '</td>';
          //echo '<td>' . htmlspecialchars($linha['turma_nome'] ?? 'N/A') . '</td>';
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