<?php
session_start();

// Verifica se a compra foi bem-sucedida
if (!isset($_SESSION['compra_sucesso']) || $_SESSION['compra_sucesso'] !== true) {
    // Se não houver sinalização de compra bem-sucedida, redireciona de volta para a página inicial
    header("Location: index.php");
    exit();
}

// Limpa a sinalização de compra bem-sucedida da sessão
unset($_SESSION['compra_sucesso']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmação de Compra - YourClass</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Font Awesome para ícones -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <!-- Estilos personalizados -->
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            padding-top: 60px; /* Ajuste conforme necessidade */
        }
        .container {
            max-width: 800px;
        }
        .confirmation-card {
            background-color: #ffffff;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            padding: 30px;
            border-radius: 10px;
            margin-top: 30px;
        }
        .confirmation-icon {
            font-size: 3em;
            color: #28a745;
            margin-bottom: 20px;
        }
        .confirmation-title {
            font-size: 1.5em;
            font-weight: bold;
            margin-bottom: 20px;
        }
        .confirmation-text {
            font-size: 1.1em;
            margin-bottom: 20px;
        }
        .confirmation-button {
            margin-top: 20px;
        }
    </style>
</head>
<body>

    <!-- NavBar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="../index.php">YourClass</a>
        </div>
    </nav>

    <!-- Conteúdo da Página -->
    <div class="container mt-5">
        <div class="card confirmation-card">
            <div class="card-body text-center">
                <i class="fas fa-check-circle confirmation-icon"></i>
                <h1 class="card-title confirmation-title">Compra Concluída com Sucesso!</h1>
                <p class="card-text confirmation-text">Obrigado por comprar o curso. Você receberá mais informações no seu email em breve.</p>
                <a href="../index.php" class="btn btn-primary confirmation-button">Voltar para a Página Inicial</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-Lf/xB4eJ4ZFtHIfPrTxfvacj5pZlRI++0J73s0k1OsPeD4u3GM0wItBc0zBf4o0J" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>
