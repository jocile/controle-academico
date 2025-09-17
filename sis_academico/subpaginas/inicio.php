<div class="container mt-3 mb-5 py-5 text-center align-items-center d-flex flex-column">
  <div class="card card shadow p-4 mb-4 bg-white">
    <div class="card-body">
      <h4 class="card-title">Bem vindo ao Sistema de Controle Acadêmico</h4>

      <p class="card-text">Aqui você poderá consultar suas <a href="notas.htm"><i>notas</i></a>.</p>
      <p class="card-text">E Também a <a href="frequencia.htm">frequência</a>.</p>

      <a class="card-link" href="https://cursos.ce.senac.br/" target="_blank">
        <img src="https://cursos.ce.senac.br/wp-content/uploads/2021/03/senac-logo.png">
      </a><br>
      <p>Para começar, por favor, faça login ou registre-se.</p>

      <!-- login e registro -->

      <?php
      if (isset($_SESSION['nao autenticado'])):
      ?>
        <div class="notification is-danger">
          <p>ERRO: Usuário ou senha inválidos.</p>
        </div>
      <?php
      endif;
      unset($_SESSION['nao_autenticado']);
      ?>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <form action="database/login.php" method="POST">
              <div class="mb-3">
                <input name="usuario" name="text" placeholder="Seu usuário" autofocus="">
              </div>
              <div class="mb-3">
                <input name="senha" type="password" placeholder="Sua senha">
              </div>
              <button type="submit">Entrar</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>