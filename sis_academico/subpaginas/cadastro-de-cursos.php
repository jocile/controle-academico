<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Formulário de Cadastro de Cursos</h4>
    </div>
    <div class="card-body">
      <form action="database/cadastro_de_cursos.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Nome:</span>
          <input type="text" class="form-control" name="nome" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Duração:</span>
          <input type="text" class="form-control" name="duracao" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Coordenador:</span>
          <!--<input type="text" class="form-control" name="coordenador" required>-->
          <?php
            // Conexão com o banco de dados
            require("database/conexao.php");

            // Consulta para obter os professores
            $query = "SELECT id, nome FROM professores ORDER BY nome";
            $result = mysqli_query($conn, $query);

            // Verifica se há resultados
            if (mysqli_num_rows($result) > 0) {
              echo '<select name="coordenador" class="form-select" required>';
              echo '<option value="">Selecione o Coordenador</option>';
              // Loop pelos resultados e cria as opções do select
              while ($row = mysqli_fetch_assoc($result)) {
                echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['nome']) . '</option>';
              }
              echo '</select>';
            } else {
              echo 'Nenhum professor encontrado.';
            }

            // Fecha a conexão com o banco de dados
            mysqli_close($conn);
          ?>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Nível:</span>
          <select name="nivel" id="nivel" class="form-select">
            <option value="">Selecione o nível do curso</option>
            <option value="Técnico">Técnico</option>
            <option value="Tecnólogo">Tecnólogo</option>
            <option value="Bacharelado">Bacharelado</option>
            <option value="Licenciatura">Licenciatura</option>
            <option value="Especialização">Especialização</option>
          </select>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Modalidade:</span>
          <select name="modalidade" id="modalidade" class="form-select" required>
            <option value="">Selecione a Modalidade</option>
            <option value="Presencial">Presencial</option>
            <option value="a_distancia">À distância</option>
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
