<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Cadastro de disciplinas:</h4>
    </div>
    <div class="card-body">
      <form action="database/cadastro_de_disciplinas.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Nome da Disciplina:</span>
          <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Carga Horária:</span>
          <input type="number" class="form-control" id="carga_horaria" name="carga_horaria" placeholder="Número de horas aula" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Créditos:</span>
          <input type="number" class="form-control" id="creditos" name="creditos" placeholder="Número de créditos" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Ementa:</span>
          <textarea class="form-control" id="ementa" name="ementa" rows="3" required></textarea>
        </div>
        <div class="card-footer text-center">
          <input type="reset" class="btn btn-secondary" value="Limpar">
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
      </form>
    </div>
  </div>
</div>