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
      $consulta = "SELECT * FROM alunos
        ORDER BY alunos.nome";
      $resultado = $conn->query($consulta);

      if ($resultado->num_rows > 0) {
        echo '<table class="table table-bordered table-striped">';
        echo '<thead><tr><th>Nome do Aluno</th><th>CPF</th><th>Endereço</th><th>Complemento</th><th>CEP</th><th>Bairro</th><th>Cidade</th><th>Estado</th><th>Telefone</th></tr></thead>';
        echo '<tbody>';
        while ($linha = $resultado->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . htmlspecialchars($linha['nome']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['cpf']) . '</td>';
          echo '<td>' . htmlspecialchars($linha['bairro'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['endereco'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['complemento'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['cep'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['cidade'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['estado'] ?? 'N/A') . '</td>';
          echo '<td>' . htmlspecialchars($linha['telefone'] ?? 'N/A') . '</td>';
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