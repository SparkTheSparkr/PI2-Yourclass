<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['email']) && isset($_POST['senha'])) {
        $email = $_POST['email'];
        $senha = $_POST['senha'];

        if ($email == "usuario@example.com" && $senha == "senha123") {

            $_SESSION['email'] = $email;

            header("Location: paginas/indexCadastrado.html");
            exit();
        } else {
            // Login inválido
            echo '<script>alert("Email ou senha incorretos.");</script>';
        }
    } else {
        // Mensagem de erro caso algum campo não seja enviado corretamente
        echo '<script>alert("Por favor, preencha todos os campos.");</script>';
    }
}
?>
