<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Controle Acadêmico</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
  <div class="container-fluid bg-primary vh-100">

    <div class="container-fluid bg-primary text-white p-3 text-center">
      <h2>Controle Acadêmico</h2>
    </div>
    <nav class="navbar navbar-expand-sm bg-light rounded-3 sticky-top mb-3">
      <div class="container-fluid">
        <a class="navbar-brand" href="index.php">Sistema Acadêmico</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Cadastros</a>
              <ul class="dropdown-menu">
                <?php
                $menu = [
                  'Cadastro de alunos' => 'cadastro_de_alunos_form',
                  'Cadastro de professores' => 'cadastro_de_professores_form',
                  'Cadastro de cursos' => 'cadastro_de_cursos_form',
                  'Matrícula' => 'menuMatricula',
                  'Cadastro de usuários' => 'cadastro-de-usuarios',
                  'Justificar Falta' => 'justificar-falta'
                ];
                foreach ($menu as $item => $pagina) {
                  echo '<li><a class="dropdown-item" href="index.php?pagina=' . $pagina . '">' . $item . '</a></li>';
                }
                ?>
              </ul>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown">Consultas</a>
              <ul class="dropdown-menu">
                <?php
                $menu = [
                  'Consulta de alunos' => 'consulta_de_alunos',
                  'Consulta de professores' => 'consulta_de_professores',
                  'Consulta de cursos' => 'consulta_de_cursos',
                  'Histórico Escolar' => 'historico_escolar',
                  'Matrículas Ativas' => 'matriculas_ativas',
                  'Faltas' => 'faltas',
                  'Justificativas' => 'justificativas'
                ];
                foreach ($menu as $item => $pagina) {
                  echo '<li><a class="dropdown-item" href="index.php?pagina=' . $pagina . '">' . $item . '</a></li>';
                }
                ?>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="regimento.php" target="_blank">Regimento Escolar</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://jocile.com/programador-web/" target="_blank">Aulas</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="https://github.com/jocile/controle-academico" target="_blank">GitHub</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Conteúdo Principal -->
    <div class="container-fluid bg-light rounded-3 main-content">
      <!-- <div class="col-10 bg-light h-100 p-3 rounded-3"> -->
      <?php
      // Verifica se o parâmetro 'pagina' foi passado e é uma string
      if (isset($_GET['pagina']) && is_string($_GET['pagina'])) {
        // Sanitiza o nome da página para evitar vulnerabilidades
        $pagina = preg_replace('/[^a-zA-Z0-9_-]/', '', htmlspecialchars($_GET['pagina'], ENT_QUOTES, 'UTF-8'));

        // Constrói o caminho para a subpágina
        $caminho_subpagina = 'subpaginas/' . $pagina . '.php'; // Assumindo que as subpáginas estão em uma pasta 'subpaginas'

        // Verifica se o arquivo da subpágina existe antes de carregá-lo
        if (file_exists($caminho_subpagina)) {
          include($caminho_subpagina);
        } else {
          echo "Página não encontrada.";
        }
      } else {
        // Se nenhum parâmetro 'pagina' for especificado, carrega a página padrão (ex: home)
        include('subpaginas/inicio.php');
      }
      ?>
    </div>
    <div class="col bg-primary text-white p-3 text-center mt-3">
      &copy; 2025 Controle Acadêmico. Todos os direitos reservados. Feito com ♥ por <a class="text-white" href="https://jocile.com/jocile/"
        target="conteudo">Jocilé
        Serra</a>
    </div>
  </div>
</body>

</html>