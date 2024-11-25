<?php
session_start();
include('../../conexao.php');  // Incluir arquivo de configuração do banco de dados

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

// Recupera o ID do curso da URL
$curso_id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

// Se o ID do curso for válido, busca as informações do banco de dados
if ($curso_id > 0) {
    $query = "SELECT c.id, c.nome, c.descricao, c.imagem, c.nota, c.alunos, c.nivel, c.preco, c.categoria, p.nome AS professor_nome, p.imagem_perfil, p.id AS professor_id
    FROM cursos c 
    LEFT JOIN curso_professor cp ON c.id = cp.curso_id
    LEFT JOIN professores p ON cp.professor_id = p.id
    WHERE c.id = $curso_id";

    $result = mysqli_query($conn, $query);

    if ($result) {
        $curso = mysqli_fetch_assoc($result);
    } else {
        echo "Curso não encontrado.";
        exit;
    }
} else {
    echo "Curso inválido.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Curso - <?php echo htmlspecialchars($curso['nome']); ?></title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .card-img-top {
            height: 400px;
            object-fit: cover;
        }
        .custom-container {
            max-width: 1200px;
        }
        .course-info {
            margin-top: 20px;
        }
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .course-category {
            margin-top: 10px;
            font-size: 1.2em;
            color: #6c757d;
        }
        .course-price {
            margin-top: 20px;
            font-size: 1.5em;
            color: #28a745;
        }
        .professor-info {
            margin-top: 20px;
            font-size: 1.1em;
            color: #343a40;
        }
        .related-courses .card {
            margin-bottom: 20px;
        }
        .related-courses-container {
            background-color: #f8f9fa;
            padding: 20px;
            border-radius: 8px;
            margin-top: 40px;
        }
        a {
          color: inherit;
          text-decoration: none;
        }
        body{
            background-image: url("../../assets/images/programacao/bgProgamacao.jpg");
            background-repeat: no-repeat;
            background-size: cover;
        }
        .perfil{
  border-radius: 50%;
  width: 150px;
  height: 150px;
  overflow: hidden;
  position: relative;
}
.perfil img{
  position: absolute;
  bottom: 0;
  width: 100%;
}
.circulo{
  border-radius: 50%;
  width: 40px;
  height: 40px;
  overflow: hidden;
  position: relative;
}
.circulo img{
  position: absolute;
  bottom: 0;
  width: 100%;
}
    </style>
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
          <li class="nav-item">
            <a class="nav-link" href="pesquisar.php">Pesquisar</a>
          </li>
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
  <!-- Fim NavBar -->

  <!-- Course Details -->
  <div class="container mt-5 custom-container">
    <div class="card">
      <img src="<?php echo $curso['imagem']; ?>" class="card-img-top" alt="<?php echo htmlspecialchars($curso['nome']); ?>">
      <div class="card-body">
        <div class="course-header">
          <h1 class="card-title"><?php echo ($curso['nome']); ?></h1>
          <span class="course-price">R$ <?php echo $curso['preco']; ?></span>
        </div>
        <p class="course-category">Categoria: <?php echo htmlspecialchars($curso['categoria']); ?></p></a>
        <p>Total de aluno: <?php echo $curso['alunos']; ?></p>
        <p>Nota do curso: <?php echo $curso['nota']; ?></p>
        <p>Nível do curso: <?php echo $curso['nivel']; ?></p>
        <div class="course-info">
          <h3>Descrição do Curso</h3>
          <p><?php echo nl2br(htmlspecialchars($curso['descricao'])); ?></p>
        </div>
        <div class="professor-info">
          <h3>Sobre o Professor</h3>
          <a href="../usuarios/professor.php?id=<?php echo $curso['professor_id']; ?>" id="prof">
            <p><strong><?php echo($curso['professor_nome']); ?></strong></p>
          </a>
          <div class="perfil">
            <img src="<?php echo $curso['imagem_perfil']; ?>" alt="Foto do Professor">
          </div>
        </div>
        <a href="comprarProg.php?id=<?php echo $curso['id']; ?>" class="btn btn-primary mt-3">Comprar Curso</a>
      </div>
    </div>

    <!-- Related Courses -->
    <div class="related-courses-container mt-5">
      <h2>Cursos Relacionados</h2>
      <div class="row mt-4 related-courses">
        <!-- Cursos relacionados podem ser recuperados aqui de maneira similar -->
      </div>
    </div>
  </div>

</body>
</html>
