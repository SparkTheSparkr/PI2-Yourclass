<?php
session_start();

// Verifica se o usuário está logado
$loggedIn = isset($_SESSION['logged_in']) && $_SESSION['logged_in'];

// Incluindo o arquivo de conexão com o banco de dados
include('../../conexao.php');

// Verifica se o usuário está logado
if (!isset($_SESSION['logged_in']) || !$_SESSION['logged_in']) {
    header("Location: login.php");
    exit();
}

// Função para validar o formulário
function validateForm($data) {
    $errors = [];

    // Validação do nome do curso
    if (empty($data['course_name'])) {
        $errors[] = 'O nome do curso é obrigatório.';
    }

    // Validação da descrição
    if (empty($data['course_description'])) {
        $errors[] = 'A descrição do curso é obrigatória.';
    }

    // Validação da categoria
    if (empty($data['course_category'])) {
        $errors[] = 'A categoria do curso é obrigatória.';
    }

    // Validação do preço
    if (empty($data['course_price']) || $data['course_price'] <= 0) {
        $errors[] = 'O preço do curso deve ser maior que zero.';
    }

    return $errors;
}

// Processar o formulário
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validação dos dados
    $errors = validateForm($_POST);

    if (empty($errors)) {
        // Processa o upload da imagem
        $imageName = $_FILES['course_image']['name'];
        $imageTmpName = $_FILES['course_image']['tmp_name'];
        $imageSize = $_FILES['course_image']['size'];
        $imageError = $_FILES['course_image']['error'];
        $imageType = $_FILES['course_image']['type'];

        // Diretório para salvar as imagens
        $uploadDir = 'uploads/courses/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Cria o diretório caso não exista
        }

        $imageExt = pathinfo($imageName, PATHINFO_EXTENSION);
        $imageNewName = uniqid('', true) . '.' . $imageExt;
        $imageDestination = $uploadDir . $imageNewName;

        // Move o arquivo da imagem para o diretório de upload
        if (move_uploaded_file($imageTmpName, $imageDestination)) {
            // Insere os dados no banco de dados
            $courseName = $_POST['course_name'];
            $courseDescription = $_POST['course_description'];
            $coursePrice = $_POST['course_price'];
            $courseCategory = $_POST['course_category'];
            $courseLevel = $_POST['course_level'];
            $courseImage = $imageDestination; // Caminho completo da imagem

            $sql = "INSERT INTO cursos (nome, descricao, preco, categoria, nivel)
                    VALUES ('$courseName', '$courseDescription', '$coursePrice', '$courseCategory', '$courseLevel')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Curso criado com sucesso!</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Erro ao criar o curso: ' . $conn->error . '</div>';
            }
        } else {
            echo '<div class="alert alert-danger" role="alert">Erro ao fazer upload da imagem.</div>';
        }
    }
}
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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso - YourClass</title>
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
          <li class="nav-item">
            <a class="nav-link" href="pesquisar.php">Pesquisar</a>
          </li>
        </ul>
        <?php renderLoginButton($loggedIn); ?>
      </div>
    </div>
  </nav>
  <!-- Fim NavBar -->

<!-- Formulário de Criação de Curso -->
<div class="container mt-5">
    <h2>Criar Novo Curso</h2>
    <form method="POST" action="criar.php" enctype="multipart/form-data">
        
        <!-- Nome do Curso -->
        <div class="mb-3">
            <label for="course_name" class="form-label">Nome do Curso</label>
            <input type="text" class="form-control" id="course_name" name="course_name" value="<?php echo isset($_POST['course_name']) ? $_POST['course_name'] : ''; ?>">
        </div>

        <!-- Descrição do Curso -->
        <div class="mb-3">
            <label for="course_description" class="form-label">Descrição do Curso</label>
            <textarea class="form-control" id="course_description" name="course_description" rows="3"><?php echo isset($_POST['course_description']) ? $_POST['course_description'] : ''; ?></textarea>
        </div>

        <div class="mb-3">
            <label for="course_price" class="form-label">Preço do Curso</label>
            <input type="number" class="form-control" id="course_price" name="course_price" value="<?php echo isset($_POST['course_price']) ? $_POST['course_price'] : ''; ?>">
        </div>

        <!-- Categoria do Curso -->
        <div class="mb-3">
            <label for="course_category" class="form-label">Categoria</label>
            <select class="form-select" id="course_category" name="course_category">
                <option value="">Escolha a categoria</option>
                <option value="Programação" <?php echo isset($_POST['course_category']) && $_POST['course_category'] == 'Programação' ? 'selected' : ''; ?>>Programação</option>
                <option value="Fotografia" <?php echo isset($_POST['course_category']) && $_POST['course_category'] == 'Fotografia' ? 'selected' : ''; ?>>Fotografia</option>
                <option value="Música" <?php echo isset($_POST['course_category']) && $_POST['course_category'] == 'Música' ? 'selected' : ''; ?>>Música</option>
                <option value="Culinária" <?php echo isset($_POST['course_category']) && $_POST['course_category'] == 'Culinária' ? 'selected' : ''; ?>>Culinária</option>
            </select>
        </div>

        <div class="mb-3">
            <label for="course_level" class="form-label">Nível do Curso</label>
            <select class="form-select" id="course_level" name="course_level">
                <option value="">Escolha o nível</option>
                <option value="1" <?php echo isset($_POST['course_level']) && $_POST['course_level'] == '1' ? 'selected' : ''; ?>>1</option>
                <option value="2" <?php echo isset($_POST['course_level']) && $_POST['course_level'] == '2' ? 'selected' : ''; ?>>2</option>
                <option value="3" <?php echo isset($_POST['course_level']) && $_POST['course_level'] == '3' ? 'selected' : ''; ?>>3</option>
                <option value="4" <?php echo isset($_POST['course_level']) && $_POST['course_level'] == '4' ? 'selected' : ''; ?>>4</option>
            </select>
        </div>
        
        <!-- Imagem do Curso -->
        <div class="mb-3">
            <label for="course_image" class="form-label">Imagem do Curso</label>
            <input class="form-control" type="file" id="course_image" name="course_image">
        </div>

        <!-- Exibição de erros -->
        <?php if (!empty($errors)): ?>
            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>

        <!-- Botão de envio -->
        <button type="submit" class="btn btn-primary">Criar Curso</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
