<?php
session_start(); // Inicia a sessão

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once 'conexao.php'; // Inclui a conexão com o banco de dados

    // Recebe os dados do formulário de login
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Sanitiza os dados para evitar SQL Injection
    $email = mysqli_real_escape_string($conn, $email);
    $senha = mysqli_real_escape_string($conn, $senha);

    // Consulta no banco de dados para verificar o usuário
    $sql = "SELECT id, nome, senha FROM usuarios WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    // Verifica se o email existe no banco
    if (mysqli_num_rows($result) == 1) {
        // Recupera os dados do usuário
        $row = mysqli_fetch_assoc($result);

        // Verifica se a senha fornecida corresponde ao hash armazenado
        if (password_verify($senha, $row['senha'])) {
            // Login bem-sucedido, armazena os dados do usuário na sessão
            $_SESSION['logged_in'] = true;  // Marca o usuário como logado
            $_SESSION['usuario_id'] = $row['id'];  // Armazena o ID do usuário
            $_SESSION['usuario_nome'] = $row['nome'];  // Armazena o nome do usuário

            // Redireciona para a página inicial ou para a área restrita
            header("Location: paginas/index.php");
            exit();
        } else {
            // Se a senha não corresponder
            $_SESSION['login_erro'] = "Email ou senha inválidos.";
            header("Location: paginas/login.php");
            exit();
        }
    } else {
        // Se o email não for encontrado
        $_SESSION['login_erro'] = "Email ou senha inválidos.";
        header("Location: paginas/login.php");
        exit();
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
} else {
    // Se o método não for POST, redireciona para a página de login
    header("Location: paginas/login.php");
    exit();
}
?>
