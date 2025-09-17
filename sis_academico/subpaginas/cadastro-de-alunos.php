<!DOCTYPE html>

<!-- Modelo de formulário para cadastro de alunos: https://www.w3schools.com/bootstrap5/bootstrap_form_input_group.php -->
<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Formulário de Cadastro de Alunos</h4>
    </div>
    <div class="card-body">
      <form action="database/cadastro_de_alunos.php" method="post">
        <div class="input-group mb-3">
          <span class="input-group-text">Nome:</span>
          <input type="text" class="form-control" id="nome" name="nome" required>
          <span class="input-group-text">CPF:</span>
          <input type="text" class="form-control" id="cpf" name="cpf" required>
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Endereço:</span>
          <input type="text" class="form-control" id="endereco" name="endereco">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Complemento:</span>
          <input type="text" class="form-control" id="complemento" name="complemento">
          <span class="input-group-text">CEP:</span>
          <input type="text" class="form-control" id="cep" name="cep">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Bairro:</span>
          <input type="text" class="form-control" id="bairro" name="bairro">
          <span class="input-group-text">Cidade:</span>
          <input type="text" class="form-control" id="cidade" name="cidade">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Estado:</span>
          <select name="estado" id="estado" class="form-select">
            <option value="">Selecione o Estado</option>

            <?php
            $estados = [
              'AC' => 'Acre',
              'AL' => 'Alagoas',
              'AP' => 'Amapá',
              'AM' => 'Amazonas',
              'BA' => 'Bahia',
              'CE' => 'Ceará',
              'DF' => 'Distrito Federal',
              'ES' => 'Espírito Santo',
              'GO' => 'Goiás',
              'MA' => 'Maranhão',
              'MT' => 'Mato Grosso',
              'MS' => 'Mato Grosso do Sul',
              'MG' => 'Minas Gerais',
              'PA' => 'Pará',
              'PB' => 'Paraíba',
              'PR' => 'Paraná',
              'PE' => 'Pernambuco',
              'PI' => 'Piauí',
              'RJ' => 'Rio de Janeiro',
              'RN' => 'Rio Grande do Norte',
              'RS' => 'Rio Grande do Sul',
              'RO' => 'Rondônia',
              'RR' => 'Roraima',
              'SC' => 'Santa Catarina',
              'SP' => 'São Paulo',
              'SE' => 'Sergipe',
              'TO' => 'Tocantins'
            ];
            foreach ($estados as $sigla => $estado) {
              echo '<option value="' . $sigla . '">' . $estado . '</option>';
            }
            ?>
          </select>
          <span class="input-group-text">Telefone:</span>
          <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>
        <div class="card-footer text-center">
          <input type="reset" class="btn btn-secondary" value="Limpar">
          <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
      </form>
    </div>
  </div>
</div>