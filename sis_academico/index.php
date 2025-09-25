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
  <div class="container-fluid bg-primary" style="min-height: 100vh; display: flex; flex-direction: column;">

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
                  'Cadastro de alunos' => 'cadastro-de-alunos',
                  'Cadastro de professores' => 'cadastro-de-professores',
                  'Cadastro de cursos' => 'cadastro-de-cursos',
                  'Matrícula de cursos' => 'matricula-de-cursos',
                  'Cadastro de usuários' => 'cadastro-de-usuarios',
                  'Cadastro de disciplinas' => 'cadastro-de-disciplinas',
                  'Cadastro de disciplinas em cursos' => 'cadastro-de-disciplinas-em-cursos',
                  'Cadastro de turmas' => 'cadastro-de-turmas',
                  'Matrícula de alunos em turmas' => 'matricula-de-alunos-em-turmas',
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
                  'Consulta de alunos(as) matriculados(as) em um curso' => 'consulta_de_alunos_em_cursos',
                  'Consulta de alunos(as) matriculados(as) em uma turma' => 'consulta_de_alunos_em_turmas',
                  'Consulta de professores' => 'consulta_de_professores',
                  'Consulta de Professor(a) de uma disciplina' => 'consulta_professor_de_disciplina',
                  'Consulta de cursos' => 'consulta_de_cursos',
                  'Consulta de disciplinas' => 'consulta_de_disciplinas',
                  'Consulta de turmas' => 'consulta_de_turmas',
                  'Consulta de disciplinas de um curso' => 'consulta_de_disciplinas_em_cursos',
                  'Consulta de Coordenador(a) de um curso' => 'consulta_coordenador_de_curso',
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
              <a class="nav-link" href="index.php?pagina=regimento">Regimento Escolar</a>
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
    <div class="container-fluid bg-light rounded-3 main-content pb-6 flex-grow-1">
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
    <div class="fixed-bottom col bg-primary text-white py-2 mt-auto text-center">
      &copy; 2025 Controle Acadêmico. Todos os direitos reservados. Feito com ♥ por <a class="text-white" href="https://jocile.com/jocile/"
        target="conteudo">Jocilé
        Serra</a>
    </div>
  </div>
</body>

</html>