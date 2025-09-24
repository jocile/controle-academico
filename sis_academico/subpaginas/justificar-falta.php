<!DOCTYPE html>

<div class="container p-3">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-header text-center">
      <h4>Justificativa de Falta (usando JavaScript)</h4>
    </div>
    <div class="card-body">
      <form name="myform" action="" onsubmit="return testa_form(event)" method="get">
        <div class="input-group mb-3">
          <span class="input-group-text">Matrícula:</span>
          <input type="text" name="matricula" id="matricula" class="form-control">
        </div>
        <div class="input-group mb-3">
          <span class="input-group-text">Nome do Aluno:</span>
          <input type="text" name="nome_aluno" id="nome_aluno" class="form-control">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Data da Falta:</span>
          <input type="date" name="data_falta" id="data_falta" class="form-control">
        </div>

        <div class="input-group mb-3">
          <span class="input-group-text">Justificativa:</span>
          <input type="text" name="justificativa" id="justificativa" class="form-control" placeholder="Justificativa">
        </div>

        <div class="text-center" style="margin-top: 10px;">
          <input type="submit" value="Justificar Falta" class="btn btn-primary">
          <button type="reset" class="btn btn-secondary">Limpar</button>
        </div>

      </form>
    </div>
  </div>
</div>

<div class="text-center" style="margin-top: 10px;">
  <h4 id="resultado"></h4>
</div>

<!-- JavaScript para validação do formulário e confirmação da justificativa -->
<script>
  function testa_form() {
    let form = document.forms["myform"];
    if (form.matricula.value === "" || form.matricula.value == null) {
      alert("Preencha o campo matrícula!");
      form.matricula.focus();
      return false;
    } else
    if (form.nome_aluno.value === "" || form.nome_aluno.value == null) {
      alert("Preencha o campo nome do aluno!");
      form.nome_aluno.focus();
      return false;
    } else
    if (form.data_falta.value === "" || form.data_falta.value == null) {
      alert("Preencha o campo data da falta!");
      form.data_falta.focus();
      return false;
    } else
    if (form.justificativa.value === "" || form.justificativa.value == null) {
      alert("Preencha o campo justificativa!");
      form.justificativa.focus();
      return false;
    } else justifica_falta(form);
    return false; // Evita o envio do formulário
  }

  function justifica_falta(form) {
    let jf = confirm("Justificar falta?" + form.nome_aluno.value + "?");
    if (jf) {
      document.getElementById("resultado").innerHTML = "Falta justificada para: " + form.nome_aluno.value + " com o motivo: " + form.justificativa.value;
    } else {
      document.getElementById("resultado").innerHTML = "Falta não justificada.";
    }

  }
</script>