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
    <title>YourClass</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
.x{
    height: 40vh;
    display: flex;
    justify-content: center;
    align-items: center;
    flex-direction: column;
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
.containerCursos {
  border: 1px solid black;
  border-radius: 15px;
  padding: 15px;
}

.card img {
  height: 175px;
}

.card h5 {
  height: 20px;
}			

.card p {
  height: 20px;
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
            <a class="nav-link" href="aluno.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../placar.php">Placar</a>
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

    <div class="x">
        <div class="perfil">
            <img src="../../assets/images/index/default.jpg">
        </div><br>
        <div><b><p>Professor João Silva</p></b></div>
    </div>
    <br>

    <div class="container containerCursos">
      <div class="row">		
            
        <div class="col-md-3 col-sm-12 mb-3">
      <div class="card cartao">
        <img src="../../assets/images/index/programacao.jpeg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Programação</h5>
          <p class="card-text">PROGRAMAÇÃO PARA INICIANTES</p>
          <br>
          <a href="#" class="btn btn-danger">Visitar</a>
        </div>
      </div>
        </div>

        <div class="col-md-3 col-sm-12 mb-3">
      <div class="card">
        <img src="../../assets/images/programacao/python.jpeg" class="card-img-top">
        <div class="card-body">
          <h5 class="card-title">Programação</h5>
          <p class="card-text">CURSO COMPLETO DE PYTHON</p>
          <br>
          <a href="#" class="btn btn-danger">Visitar</a>
        </div>
      </div>
        </div>        	       	        	

      </div>
  </div>
</body>
</html>