<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Cursos cadastrados</h4>
    </div>
    <div class="card-body">
      <?php
      // Conexão com o banco de dados
      require("database/conexao.php");

      // Inicia a consulta para mostrar os cursos cadastrados
      $consulta = "SELECT * FROM cursos ORDER BY nome";
      $resultado = $conn->query($consulta);
      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Nome do Curso</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
          echo '</tr>';
        }
        echo '</tbody></table>';
      } else {
        echo '<p>Nenhum curso cadastrado.</p>';
      }
      $conn->close();
      ?>
    </div>
  </div>
</div>