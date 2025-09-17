<!DOCTYPE html>

<div class="container">
  <div class="row mt-5">
    <div class="card col-lg-4 col-md-6 col-sm-8 offset-lg-4 offset-md-3 offset-sm-2">
      <div class="card-header text-center">
        <h2>Cadastro de usuário</h2>
      </div>
      <div class="card-body">
        <form action="database/cadastro_de_usuarios.php" method="post">
          <div class="mb-3">
            <label for="usuario" class="form-label">Login</label>
            <input type="text" class="form-control" id="usuario" name="usuario" required />
          </div>
          <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" id="senha" name="senha" required />
          </div>
          <div class="mb-3">
            <label for="tipo_usuario" class="form-label">Tipo de usuário</label>
            <select class="form-select" id="tipo_usuario" name="tipo_usuario" required>
              <option value="">Selecione</option>
              <option value="1">Administrador</option>
              <option value="2">Usuário Comum</option>
            </select>
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary" name="cadastrar" value="cadastrar">Cadastrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>