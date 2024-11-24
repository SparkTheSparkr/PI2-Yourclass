<?php
session_start();

// Verifica se o usuário está logado
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];

// Incluir a configuração do banco de dados
include_once('../../conexao.php'); // Verifique o caminho correto do seu arquivo db.php

// Verifica se o ID do professor foi passado na URL
if (isset($_GET['id'])) {
    $professor_id = $_GET['id'];

    // Buscar as informações do professor
    $stmt = $conn->prepare("SELECT nome, imagem_perfil FROM professores WHERE id = ?");
    $stmt->bind_param("i", $professor_id);  // Bind do parâmetro para segurança
    $stmt->execute();
    $result = $stmt->get_result();
    $professor = $result->fetch_assoc();

    // Verifica se o professor existe
    if (!$professor) {
        echo "Professor não encontrado!";
        exit;
    }

    // Buscar os cursos do professor
    $stmtCursos = $conn->prepare("SELECT c.id, c.nome AS curso_nome, c.descricao, c.imagem FROM cursos c
                                  LEFT JOIN curso_professor cp ON c.id = cp.curso_id
                                  WHERE cp.professor_id = ?");
    $stmtCursos->bind_param("i", $professor_id);  // Bind do parâmetro para segurança
    $stmtCursos->execute();
    $resultCursos = $stmtCursos->get_result();
    $cursos = $resultCursos->fetch_all(MYSQLI_ASSOC);
    
    // Fechar a conexão
    $stmt->close();
    $stmtCursos->close();
    mysqli_close($conn);
} else {
    echo "ID do professor não especificado!";
    exit;
}

// Verifica se o usuário está logado
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];

// Função para exibir o botão de login ou logout
function renderLoginButton($loggedIn) {
    if ($loggedIn) {
        echo '<div class="nav-item d-flex me-2">
        <a class="nav-link" href="usuarios/aluno.php">
          <div class="circulo"><img src="../../assets/images/index/default.jpg"></div>
        </a>
      </div>
      <!-- Botão de login/sair -->
      <div class="nav-item d-flex ">
        <a class="btn btn-light me-2" href="../../logout.php">Sair</a>
      </div>';
    } else {
        echo '<a class="btn btn-light me-2" href="../login.php">Cadastre-se ou Entre</a>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Professor</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

  <!-- NavBar -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="../index.php">YourClass</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../sobrenos.php">Sobre nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../usuarios/aluno.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../placar.php">Placar</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              Cursos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="../categorias/culinaria.php">Culinária</a></li>
              <li><a class="dropdown-item" href="../categorias/fotografia.php">Fotografia</a></li>
              <li><a class="dropdown-item" href="../categorias/musica.php">Música</a></li>
              <li><hr class="dropdown-divider"></li>
              <li><a class="dropdown-item" href="../index.php#cursos">Mais cursos</a></li>
            </ul>
          </li>
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
  <!-- Fim NavBar -->

  <div class="container mt-5">
    <div class="row">
      <div class="col-md-4">
        <!-- Exibe a imagem do professor -->
        <div class="perfil">
          <img src="<?php echo $professor['imagem_perfil']; ?>" alt="Foto do Professor" class="img-fluid">
        </div>
      </div>
      <div class="col-md-8">
        <!-- Exibe o nome e biografia do professor -->
        <h2><?php echo $professor['nome']; ?></h2>

        <!-- Exibe os cursos que o professor leciona -->
        <h3>Cursos que leciona:</h3>
        <ul>
          <?php foreach ($cursos as $curso): ?>
            <li>
              <a href="../cursos/programacao.php?id=<?php echo $curso['id']; ?>" class="text-decoration-none">
                <?php echo $curso['curso_nome']; ?>
              </a> - <?php echo $curso['descricao']; ?>
            </li>
          <?php endforeach; ?>
        </ul>
      </div>
    </div>
  </div>

</body>
</html>
