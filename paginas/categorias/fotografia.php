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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourClass - Fotografia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      .cursos {
        display: flex;
        justify-content: center;
        align-content: center;
        margin-bottom: 20px;
      }
      .conteudo {
        width: 90%;
        padding: 15px;
        border-radius: 10px;
        border: 1px solid black;
        background-color: #f8f9fa; /* Background color slightly lighter than white */
      }
      .flex-centered {
        display: flex;
        justify-content: center;
        align-items: center;
      }
      .course-header p {
        font-size: 20px;
        font-weight: bold;
      }

      .tamanho-imagem {
        width: 100%;
        height: 350px;
        object-fit: cover;
        border-radius: 5px;
      }
      .perfil {
        border-radius: 50%;
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: relative;
      }
      .perfil img {
        position: absolute;
        bottom: 0;
        width: 100%;
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
            <a class="nav-link" href="../usuaios/aluno.php">Perfil</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="../placar.php">Placar</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="true">
              Cursos
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="culinaria.php">Culinária</a></li>
              <li><a class="dropdown-item" href="fotografia.php">Fotografia</a></li>
              <li><a class="dropdown-item" href="musica.php">Música</a></li>
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
  <br><br>
  
  <!-- Curso: Fotografia Básica -->
  <div class="cursos">
    <div class="conteudo row">
      <div class="col-4">
        <img src="../../assets/images/index/fotoBasica.jpg" width="100%" height="95%" class="tamanho-imagem">
      </div>
      <div class="col-8 flex-centered row">
        <div class="col-6">
          <div class="course-header">
            <p>FOTOGRAFIA BÁSICA</p>
          </div>
          <p>Aprenda técnicas básicas de fotografia para capturar momentos incríveis</p>
          <p>Prática com câmeras digitais e edição de fotos</p>
          <br>
          <a href="../cursos/fotoExemplo.php" class="btn btn-primary">Visitar Curso</a>
        </div>
        <div class="col-1"></div>
        <div class="col-5" style="text-align: end;">
          <div class="row">
            <div class="col-11"><p>Prof. Maria Souza</p></div>
            <div class="col-1">
              <a href="../usuarios/professor.php"><img src="../../assets/images/index/default.jpg" width="30px" height="30px"></a>
            </div>
          </div>
          <br><br><br><br><br>
          <p>Nota do curso: 4,5</p>
          <p>Total de alunos: 100</p>
          <p>Nível do curso: 1</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>
  
  <!-- Curso: Fotografia Avançada -->
  <div class="cursos">
    <div class="conteudo row">
      <div class="col-4">
        <img src="../../assets/images/index/fotoAvancada.jpg" width="100%" height="95%" class="tamanho-imagem">
      </div>
      <div class="col-8 flex-centered row">
        <div class="col-6">
          <div class="course-header">
            <p>FOTOGRAFIA AVANÇADA</p>
          </div>
          <p>Domine técnicas avançadas de fotografia para capturar imagens profissionais</p>
          <p>Iluminação, composição e edição avançada de fotos</p>
          <br>
          <a href="../cursos/fotografia_avancada.php" class="btn btn-primary">Visitar Curso</a>
        </div>
        <div class="col-1"></div>
        <div class="col-5" style="text-align: end;">
          <div class="row">
            <div class="col-11"><p>Prof. Ana Oliveira</p></div>
            <div class="col-1">
              <a href="../usuarios/professor.php"><img src="../../assets/images/index/default.jpg" width="30px" height="30px"></a>
            </div>
          </div>
          <br><br><br><br><br>
          <p>Nota do curso: 4,9</p>
          <p>Total de alunos: 80</p>
          <p>Nível do curso: 4</p>
        </div>
      </div>
    </div>
  </div>
  <br><br>

</body>
</html>
