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
    <title>YourClass</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .carousel-inner {
            height: 0;
            padding-bottom: 35%;
        }

        .carousel-item {
            position: absolute !important;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
        .carousel-item img {
            height: 100%;
            object-fit: cover;
        }
        .card {
            height: 100%;
        }
        .card-body {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .card-img-top {
            height: 250px; /* Set a fixed height for images */
            object-fit: cover; /* Ensure the image covers the entire area */
        }
        .row-spacing {
            margin-top: 30px; /* Add space between rows */
        }
        .custom-container {
            max-width: 1700px; /* Limit container width */
        }
        .card.mb-4{
          margin-bottom: 20px;
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

  <!-- Carousel -->
  <div id="carouselExampleCaptions" class="carousel slide">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <a href="categorias/programacao.php">
        <div class="carousel-item active">
          <img src="../assets/images/index/programacao.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Programação</h5>
            <p>Aprenda a desenvolver sistemas em nossos cursos</p>
          </div>
        </div>
      </a>
      <div class="carousel-item">
        <a href="categorias/musica.php">
          <img src="../assets/images/index/musica.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Música</h5>
            <p>Descubra os segredos da teoria musical e dos instrumentos!</p>
          </div>
        </a>
      </div>
      <div class="carousel-item">
        <a href="categorias/culinaria.php">
          <img src="../assets/images/index/culinaria.jpeg" class="d-block w-100" alt="...">
          <div class="carousel-caption d-none d-md-block">
            <h5>Culinária</h5>
            <p>Cozinhe como ninguém!</p>
          </div>
        </a>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Exemplos de Curso -->
  <div class="container mt-5 custom-container">
    <h2 class="text-center">Explore alguns dos nossos cursos mais vendidos</h2>
    <div class="row mt-4 row-spacing">
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/fotoBasica.jpg" class="card-img-top" alt="Fotografia 1">
          <div class="card-body">
            <h5 class="card-title">Fotografia Básica</h5>
            <p class="card-text">Comece sua jornada na fotografia aprendendo o básico.</p>
            <a href="cursos/fotoExemplo.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/admPublica.jpg" class="card-img-top" alt="Administração 2">
          <div class="card-body">
            <h5 class="card-title">Administração Pública</h5>
            <p class="card-text">Explore os princípios da administração no setor público.</p>
            <a href="cursos/admExemplo.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/programacao/python.jpeg" class="card-img-top" alt="Programação 1">
          <div class="card-body">
            <h5 class="card-title">Python para iniciantes</h5>
            <p class="card-text">Aprenda o básico de programação com Python, uma linguagem poderosa e versátil.</p>
            <a href="cursos/progExemplo.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/logECadeia.jpg" class="card-img-top" alt="Logística 1">
          <div class="card-body">
            <h5 class="card-title">Logística e Cadeia de Suprimentos</h5>
            <p class="card-text">Domine a logística e a gestão da cadeia de suprimentos.</p>
            <a href="categorias/logistica.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/admEmpresas.jpg" class="card-img-top" alt="Administração 1">
          <div class="card-body">
            <h5 class="card-title">Administração de Empresas</h5>
            <p class="card-text">Aprenda a gerenciar empresas de maneira eficaz.</p>
            <a href="categorias/administracao.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/fotoAvancada.jpg" class="card-img-top" alt="Fotografia 2">
          <div class="card-body">
            <h5 class="card-title">Fotografia Avançada</h5>
            <p class="card-text">Aprimore suas habilidades com técnicas avançadas de fotografia.</p>
            <a href="categorias/fotografia.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/culinariaBasica.jpg" class="card-img-top" alt="Culinária 1">
          <div class="card-body">
            <h5 class="card-title">Culinária Básica</h5>
            <p class="card-text">Aprenda técnicas básicas de culinária para iniciantes.</p>
            <a href="categorias/culinaria.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
      <div class="col-md-3 mb-4">
        <div class="card">
          <img src="../assets/images/index/musicaBasica.jpg" class="card-img-top" alt="Música 1">
          <div class="card-body">
            <h5 class="card-title">Música para Iniciantes</h5>
            <p class="card-text">Descubra os fundamentos da teoria musical.</p>
            <a href="categorias/musica.php" class="btn btn-primary">Ver curso</a>
          </div>
        </div>
      </div>
    </div>
  </div>

        <!-- Categorias -->
        <a name="cursos">
          <div class="row d-flex justify-content-center">
            <h1 class="d-flex justify-content-center mt-5 mb-5">
              Não encontrou o que queria? Busque pelas categorias!
            </h1>
  
            <div class="row d-flex justify-content-center">
            <div class="col-md-4 col-centered d-flex justify-content-center">
              <a href="categorias/administracao.php">
               <img src="../assets/images/index/adCursoAdm.png">
              </a>
            </div>
            
            <div class="col-md-4 col-centered d-flex justify-content-center">
              <a href="categorias/musica.php">
                <img src="../assets/images/index/adCursoMus.png">
              </a>
            </div>
  
            <div class="col-md-4 col-centered d-flex justify-content-center">
              <a href="categorias/programacao.php">
               <img src="../assets/images/index/adCursoProg.png">
              </a>
            </div>
          </div>
  
          <div class="row d-flex justify-content-center">
              <div class="col-md-4 col-centered d-flex justify-content-center"><p>Administração</p></div>
              <div class="col-md-4 col-centered d-flex justify-content-center"><p>Música</p></div>
              <div class="col-md-4 col-centered d-flex justify-content-center"><p>Programação</p></div>
          </div>
          
          <div class="row d-flex justify-content-center mt-5">
            <div class="col-md-4 col-centered d-flex justify-content-center">
              <a href="categorias/culinaria.php">
              <img src="../assets/images/index/adCursoCulin.png">
            </a>
           </div>
  
           <div class="col-md-4 col-centered d-flex justify-content-center">
            <a href="categorias/fotografia.php">
            <img src="../assets/images/index/adCursoFoto.png">
          </a>
           </div>
  
           <div class="col-md-4 col-centered d-flex justify-content-center">
            <a href="categorias/logistica.php">
            <img src="../assets/images/index/adCursoLog.png">
          </a>
           </div>
          </div>
          <div class="row d-flex justify-content-center">
              <div class="col-md-4 col-centered d-flex justify-content-center"><p>Culinária</p></div>
              <div class="col-md-4 col-centered d-flex justify-content-center"><p>Fotografia</p></div>
              <div class="col-md-4 col-centered d-flex justify-content-center"><p>Logística</p></div>
          </div>
        </div>
</body>
</html>