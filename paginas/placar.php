<?php
session_start();

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
                <a class="btn btn-light me-2" href="../logout.php">Sair</a>
              </div>';
    } else {
        echo '<a class="btn btn-light me-2" href="login.php">Cadastre-se ou Entre</a>';
    }
}

$cursos = [
    ['nome' => 'Python para Iniciantes', 'pontuacao' => 950, 'estrelas' => 4.5, 'linkcurso' => 'cursos/progExemplo.php', 'imagem' => '../../assets/images/programacao/python.jpeg'],
    ['nome' => 'Fotografia Básica', 'pontuacao' => 880, 'estrelas' => 4.2, 'linkcurso' => 'cursos/fotoExemplo.php', 'imagem' => '../../assets/images/index/fotoBasica.jpg'],
    ['nome' => 'Administração Pública', 'pontuacao' => 920, 'estrelas' => 4.7, 'linkcurso' => 'cursos/admExemplo.php', 'imagem' => '../../assets/images/index/admPublica.jpg'],
];

$professores = [
    ['nome' => 'João Silva', 'pontuacao' => 970, 'estrelas' => 4.8],
    ['nome' => 'Maria Souza', 'pontuacao' => 940, 'estrelas' => 4.6],
    ['nome' => 'Pedro Almeida', 'pontuacao' => 910, 'estrelas' => 4.4],
];

$alunos = [
    ['nome' => 'Ana Oliveira', 'pontuacao' => 980, 'estrelas' => 4.9],
    ['nome' => 'Carlos Santos', 'pontuacao' => 960, 'estrelas' => 4.7],
    ['nome' => 'Mariana Lima', 'pontuacao' => 930, 'estrelas' => 4.5],
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourClass - Placar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        .navbar-brand {
            font-size: 1.5rem;
        }
        .circulo {
            border-radius: 50%;
            width: 40px;
            height: 40px;
            overflow: hidden;
            position: relative;
        }
        .circulo img {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        .card {
            margin-bottom: 20px;
        }
        .card-img-top {
            height: 250px;
            object-fit: cover;
        }
    </style>
</head>
<body>
    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">YourClass</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="sobrenos.php">Sobre nós</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="usuarios/aluno.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="placar.php">Placar</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
                            Cursos
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="categorias/culinaria.php">Culinária</a></li>
                            <li><a class="dropdown-item" href="categorias/fotografia.php">Fotografia</a></li>
                            <li><a class="dropdown-item" href="categorias/musica.php">Música</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Mais cursos</a></li>
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

    <div class="container mt-5">
        <h1 class="text-center mb-5">Placar de Melhores Cursos, Professores e Alunos</h1>

        <!-- Melhores Cursos -->
        <h2>Melhores Cursos</h2>
        <div class="row">
            <?php foreach ($cursos as $curso): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="<?php echo $curso['imagem']; ?>" class="card-img-top" alt="<?php echo $curso['nome']; ?>">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $curso['nome']; ?></h5>
                            <p class="card-text">Pontuação: <?php echo $curso['pontuacao']; ?> / Estrelas: <?php echo $curso['estrelas']; ?></p>
                            <a href="<?php echo $curso['linkcurso']; ?>" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Melhores Professores -->
        <h2 class="mt-5">Melhores Professores</h2>
        <div class="row">
            <?php foreach ($professores as $professor): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $professor['nome']; ?></h5>
                            <p class="card-text">Pontuação: <?php echo $professor['pontuacao']; ?> / Estrelas: <?php echo $professor['estrelas']; ?></p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

        <!-- Melhores Alunos -->
        <h2 class="mt-5">Melhores Alunos</h2>
        <div class="row">
            <?php foreach ($alunos as $aluno): ?>
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $aluno['nome']; ?></h5>
                            <p class="card-text">Pontuação: <?php echo $aluno['pontuacao']; ?> / Estrelas: <?php echo $aluno['estrelas']; ?></p>
                            <a href="#" class="btn btn-primary">Visitar</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
