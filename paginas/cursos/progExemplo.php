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
    <title>Detalhes do Curso - Python para Iniciantes</title>
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
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
    <!-- Fim NavBar -->

  <!-- Course Details -->
  <div class="container mt-5 custom-container">
    <div class="card">
      <img src="../../assets/images/programacao/python.jpeg" class="card-img-top" alt="Python para Iniciantes">
      <div class="card-body">
        <div class="course-header">
          <h1 class="card-title">Python para Iniciantes</h1>
          <span class="course-price">R$ 299,99</span>
        </div>
        <a href="../categorias/programacao.php"><p class="course-category">Categoria: Programação</p></a>
        <p>Total de aluno: 150</p>
        <p>Nota do curso: 4,7</p>
        <div class="course-info">
          <h3>Descrição do Curso</h3>
          <p>Este curso é destinado a quem deseja iniciar na programação utilizando a linguagem Python. 
          Através de uma abordagem prática e interativa, você aprenderá desde os conceitos básicos até a criação de projetos simples. 
          Conteúdo abordado no curso:</p>
          <ul>
            <li>Introdução à programação e Python</li>
            <li>Configuração do ambiente de desenvolvimento</li>
            <li>Variáveis e tipos de dados</li>
            <li>Operadores e expressões</li>
            <li>Estruturas de controle (condicionais e loops)</li>
            <li>Funções e modularização</li>
            <li>Manipulação de strings e listas</li>
            <li>Introdução a bibliotecas e módulos</li>
            <li>Manipulação de arquivos</li>
            <li>Noções de orientação a objetos</li>
            <li>Projetos práticos: Calculadora, Jogo da Forca, Web Scraping básico</li>
          </ul>
        </div>
        <div class="professor-info">
          <h3>Sobre o Professor</h3>
          <a href="../usuarios/professor.php" id="prof"><p><strong>Prof. João Silva</strong></p></a>
          <p>João Silva é um experiente desenvolvedor de software com mais de 15 anos de atuação na área de tecnologia. 
          Formado em Ciência da Computação pela Universidade Federal de São Paulo, João já trabalhou em grandes empresas de tecnologia e startups, 
          desenvolvendo desde aplicativos móveis até sistemas de grande escala para o mercado financeiro. 
          Ele possui certificações em diversas linguagens de programação e é apaixonado por ensinar. 
          Atualmente, João se dedica a ministrar cursos de programação e a compartilhar seu conhecimento através de palestras e workshops em eventos de tecnologia.
          </p>
        </div>
        <a href="comprarProg.php" class="btn btn-primary mt-3">Comprar Curso</a>
      </div>
    </div>

    <!-- Related Courses -->
    <div class="related-courses-container mt-5">
      <h2>Cursos Relacionados</h2>
      <div class="row mt-4 related-courses">
        <div class="col-md-4">
          <div class="card">
            <img src="../assets/images/cursos/curso1.jpg" class="card-img-top" alt="Curso Relacionado 1">
            <div class="card-body">
              <h5 class="card-title">Curso Relacionado 1</h5>
              <p class="card-text">Descrição breve do curso relacionado 1.</p>
              <a href="curso_relacionado_1.php" class="btn btn-primary">Ver Curso</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="../assets/images/cursos/curso2.jpg" class="card-img-top" alt="Curso Relacionado 2">
            <div class="card-body">
              <h5 class="card-title">Curso Relacionado 2</h5>
              <p class="card-text">Descrição breve do curso relacionado 2.</p>
              <a href="curso_relacionado_2.php" class="btn btn-primary">Ver Curso</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card">
            <img src="../assets/images/cursos/curso3.jpg" class="card-img-top" alt="Curso Relacionado 3">
            <div class="card-body">
              <h5 class="card-title">Curso Relacionado 3</h5>
              <p class="card-text">Descrição breve do curso relacionado 3.</p>
              <a href="curso_relacionado_3.php" class="btn btn-primary">Ver Curso</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</body>
</html>
