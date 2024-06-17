<?php
session_start();

// Verifica se o método de requisição é POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Inclui o arquivo de conexão com o banco de dados
    require_once 'conexao.php';

    // Recebe os dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Sanitiza os dados para evitar SQL Injection
    $email = mysqli_real_escape_string($conn, $email);
    $senha = mysqli_real_escape_string($conn, $senha);

    // Consulta SQL para verificar o usuário no banco de dados
    $sql = "SELECT id, nome FROM usuarios WHERE email = '$email' AND senha = '$senha'";
    $result = mysqli_query($conn, $sql);

    // Verifica se houve algum resultado
    if (mysqli_num_rows($result) == 1) {
        // Login bem-sucedido
        $row = mysqli_fetch_assoc($result);

        // Configura variáveis de sessão
        $_SESSION['logged_in'] = true;
        $_SESSION['usuario_id'] = $row['id'];
        $_SESSION['usuario_nome'] = $row['nome'];

        // Redireciona para a página inicial (ou qualquer outra página protegida)
        header("Location: paginas/index.php");
        exit();
    } else {
        // Falha no login
        $_SESSION['login_erro'] = "Email ou senha inválidos.";
        header("Location: paginas/login.php");
        exit();
    }

    // Fecha a conexão com o banco de dados
    mysqli_close($conn);
} else {
    // Se não for método POST, redireciona para a página de login
    header("Location: paginas/login.php");
    exit();
}
?>
