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
    <title>Compra do Curso - Python para Iniciantes</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .custom-container {
            max-width: 800px; /* Limit container width */
        }
        .course-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .course-price {
            font-size: 1.5em;
            color: #28a745;
        }
        .form-control {
            margin-bottom: 10px;
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
          <li class="nav-item">
            <a class="nav-link" href="pesquisar.php">Pesquisar</a>
          </li>
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
    <!-- Fim NavBar -->

  <div class="container mt-5 custom-container">
    <div class="card">
      <div class="card-body">
        <div class="course-header">
          <h1 class="card-title">Administração Pública</h1>
          <h2 class="card-subtitle mb-2 text-muted">Professor: Maria Oliveira</h2>
          <span class="course-price">R$115,00</span>
        </div>
        <form action="processar_compra.php" method="post">
          <div class="mb-3">
            <label for="nome" class="form-label">Nome Completo</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="mb-3">
            <label for="telefone" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
          </div>
          <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
          </div>
          <div class="mb-3">
            <label for="cartao" class="form-label">Número do Cartão</label>
            <input type="text" class="form-control" id="cartao" name="cartao" required>
          </div>
          <div class="mb-3">
            <label for="validade" class="form-label">Validade do Cartão</label>
            <input type="text" class="form-control" id="validade" name="validade" required>
          </div>
          <div class="mb-3">
            <label for="cvv" class="form-label">CVV</label>
            <input type="text" class="form-control" id="cvv" name="cvv" required>
          </div>
          <button type="submit" class="btn btn-primary">Finalizar Compra</button>
          <a href="../index.php" class="btn btn-cancel">Cancelar</a>
        </form>
      </div>
    </div>
  </div>

</body>
</html>
