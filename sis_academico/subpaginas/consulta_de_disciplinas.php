<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Disciplinas cadastradas</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar as disciplinas cadastradas
      $consulta = "SELECT * FROM disciplinas ORDER BY nome";
      $resultado = $conn->query($consulta);
      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Nome da Disciplina</th><th>Carga horária</th><th>Créditos</th><th>Ementa</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['carga_horaria']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['creditos']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['ementa']) . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhuma disciplina cadastrada.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>