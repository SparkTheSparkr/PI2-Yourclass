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
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nós - YourClass</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .corpo{
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding-top: 60px;
        }
        .container {
            max-width: 800px;
        }
        .about-header {
            text-align: center;
            margin-bottom: 30px;
        }
        .about-header h1 {
            font-size: 2.5em;
            font-weight: bold;
            color: #343a40;
        }
        .about-content {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }
        .about-icon {
            font-size: 3em;
            color: #28a745;
            margin-bottom: 20px;
        }
        .about-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .about-text {
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .team-members {
            list-style: none;
            padding: 0;
            display: flex;
            justify-content: center;
        }
        .team-member {
            margin: 0 10px;
            text-align: center;
        }
        .team-member img {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            object-fit: cover;
            margin-bottom: 10px;
        }
        .team-member h3 {
            font-size: 1.2em;
            color: #343a40;
            margin-bottom: 5px;
        }
        .team-member p {
            font-size: 0.9em;
            color: #6c757d;
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
      <a class="navbar-brand" href="index.php">YourClass</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sobrenos.php">Sobre nós</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="usuarios/aluno.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="placar.php">Placar</a>
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
              <li><a class="dropdown-item" href="#cursos">Mais cursos</a></li>
            </ul>
          </li>
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
    <!-- Fim NavBar -->

    <!-- Conteúdo da Página -->
     <div class="corpo">
    <div class="container mt-5">
        <div class="about-header">
            <h1>Sobre Nós</h1>
        </div>
        <div class="about-content">
            <div class="text-center">
                <i class="fas fa-star about-icon"></i>
                <h2 class="about-title">Nossa Missão</h2>
                <p class="about-text">O YourClass tem como objetivo proporcionar educação de qualidade e acessível para todos, incentivando o aprendizado contínuo em diversas áreas do conhecimento.</p>
            </div>
            <hr>
            <div class="text-center">
                <i class="fas fa-users about-icon"></i>
                <h2 class="about-title">Nossa Equipe</h2>
                <div class="row">
                        <ul class="team-members">
                            <li class="team-member col-md-4">
                                <h3>Eduardo Cavalhieri Xavier</h3>
                                <p>Desenvolvedor Geral & Líder do Projeto</p>
                            </li>
                            <li class="team-member col-md-4">
                                <h3>Pedro Henrique Gonçalves</h3>
                                <p>Desenvolvedor Geral & Líder do Projeto</p>
                            </li>
                            <li class="team-member col-md-4">
                                <h3>Joyce Fernanda de Araujo</h3>
                                <p>Desenvolvedor Geral & Líder do Projeto</p>
                            </li>
                        </ul>
                    </div>
                        <p class="about-text">Nossa equipe é composta por profissionais dedicados e apaixonados por educação. Cada membro traz consigo experiência única e habilidades que contribuem para o crescimento e sucesso da plataforma YourClass.</p>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-Lf/xB4eJ4ZFtHIfPrTxfvacj5pZlRI++0J73s0k1OsPeD4u3GM0wItBc0zBf4o0J" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
