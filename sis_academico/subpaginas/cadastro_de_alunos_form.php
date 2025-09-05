<!DOCTYPE html>

<!-- Modelo de formulário para cadastro de alunos: https://www.w3schools.com/bootstrap5/bootstrap_form_input_group.php -->
<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Formulário de Cadastro de Alunos</h4>
    </div>
    <div class="card-body">
      <form action="cadastro_de_alunos.php">
        <div class="input-group mb-3">
          <span class="input-group-text">Nome:</span>
          <input type="text" class="form-control" id="aluno" name="aluno" required>
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
            <option value="AC">Acre</option>
            <option value="AL">Alagoas</option>
            <option value="AP">Amapá</option>
            <option value="AM">Amazonas</option>
            <option value="BA">Bahia</option>
            <option value="CE">Ceará</option>
            <option value="DF">Distrito Federal</option>
            <option value="ES">Espírito Santo</option>
            <option value="GO">Goiás</option>
            <option value="MA">Maranhão</option>
            <option value="MT">Mato Grosso</option>
            <option value="MS">Mato Grosso do Sul</option>
            <option value="MG">Minas Gerais</option>
            <option value="PA">Pará</option>
            <option value="PB">Paraíba</option>
            <option value="PR">Paraná</option>
            <option value="PE">Pernambuco</option>
            <option value="PI">Piauí</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="RN">Rio Grande do Norte</option>
            <option value="RS">Rio Grande do Sul</option>
            <option value="RO">Rondônia</option>
            <option value="RR">Roraima</option>
            <option value="SC">Santa Catarina</option>
            <option value="SP">São Paulo</option>
            <option value="SE">Sergipe</option>
            <option value="TO">Tocantins</option>
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