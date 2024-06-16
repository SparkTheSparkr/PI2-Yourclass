<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Dados do formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $telefone = $_POST['telefone'];

    $_SESSION['email'] = $email;

    header("Location: paginas/indexCadastrado.html");
}
?>
