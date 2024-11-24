<?php
session_start();
include('../conexao.php');

// Verifica se o usuário está logado
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];

// Função para exibir o botão de login ou logout
function renderLoginButton($loggedIn)
{
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

if (!empty($_GET['search'])) {
  $data = $_GET['search'];
  $sql = "SELECT * FROM cursos WHERE nome LIKE '%data%' ORDER BY id DESC";
}
$result = $conn->query($sql);
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
      height: 250px;
      /* Set a fixed height for images */
      object-fit: cover;
      /* Ensure the image covers the entire area */
    }

    .row-spacing {
      margin-top: 30px;
      /* Add space between rows */
    }

    .custom-container {
      max-width: 1700px;
      /* Limit container width */
    }

    .card.mb-4 {
      margin-bottom: 20px;
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

    .box-search {
      display: flex;
      justify-content: center;
      gap: .1%;
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
              <li>
                <hr class="dropdown-divider">
              </li>
              <li><a class="dropdown-item" href="#cursos">Mais cursos</a></li>
            </ul>
          </li>
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
  <!-- Fim NavBar -->

  <br><br>

  <div>
    <h2>Pesquise algum curso</h2>
  </div>

  <br><br>

  <div class="box-search">
    <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">
    <button onclick="searchData()" class="btn btn-primary">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
        <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0" />
      </svg>
    </button>
  </div>

  <br><br>

  <div class="m-5">
    <table class="table text-white table-bg">
      <thead>
        <tr>
          <th scope="col">Nome</th>
          <th scope="col">Visitar</th>
        </tr>
      </thead>
      <tbody>
        <?php
        while ($user_data = mysqli_fetch_assoc($result)) {
          echo "<tr>";
          echo "<td>" . $user_data['nome'] . "</td>";
          echo "<td>
            <a class='btn btn-sm btn-primary' href='cursos/$user_data[nome]' title='Visitar'>
                <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                </svg>
                </a>
                </td>";
          echo "</tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
<script>
  var search = document.getElementById('pesquisar');

  function searchData() {
    window.location = 'pesquisar.php?search=' + search.value;
  }
</script>

</html>