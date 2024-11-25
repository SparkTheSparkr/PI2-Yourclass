<?php
session_start();
require_once 'conexao.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $senha = $_POST['senha'];
    $confirma_senha = $_POST['confirma_senha'];
    $perfil = $_POST['perfil'];

    if ($senha === $confirma_senha) {

        // Verificar se o email já está cadastrado
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {

            // Criptografar a senha antes de armazenar
            $senha_criptografada = password_hash($senha, PASSWORD_DEFAULT);

            // Inserir o novo usuário no banco de dados
            $sql = "INSERT INTO usuarios (nome, email, telefone, senha, perfil) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $nome, $email, $telefone, $senha_criptografada, $perfil);

            if ($stmt->execute()) {
                // Criar as variáveis de sessão
                $_SESSION['usuario_id'] = $stmt->insert_id;
                $_SESSION['usuario_nome'] = $nome;
                $_SESSION['usuario_perfil'] = $perfil;

                // Redirecionar para a página inicial
                header("Location: paginas/index.php");
                exit;
            } else {
                // Erro no cadastro
                $_SESSION['cadastro_erro'] = "Erro ao realizar o cadastro. Tente novamente.";
                header("Location: cadastro.php");
                exit;
            }
        } else {
            // Email já cadastrado
            $_SESSION['cadastro_erro'] = "Email já cadastrado.";
            header("Location: cadastro.php");
            exit;
        }

        $stmt->close();
        $conn->close();
    } else {
        // As senhas não coincidem
        $_SESSION['cadastro_erro'] = "As senhas não coincidem.";
        header("Location: cadastro.php");
        exit;
    }
} else {
    header("Location: cadastro.php");
    exit;
}
?>
