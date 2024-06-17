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

        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 0) {

            $sql = "INSERT INTO usuarios (nome, email, telefone, senha, perfil) VALUES (?, ?, ?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sssss", $nome, $email, $telefone, $senha, $perfil);

            if ($stmt->execute()) {
                $_SESSION['usuario_id'] = $stmt->insert_id;
                $_SESSION['usuario_nome'] = $nome;
                $_SESSION['usuario_perfil'] = $perfil;
                header("Location: paginas/index.php");
            } else {
                // Falha no cadastro
                $_SESSION['cadastro_erro'] = "Erro ao realizar o cadastro. Tente novamente.";
                header("Location: cadastro.php");
            }
        } else {
            // Email já cadastrado
            $_SESSION['cadastro_erro'] = "Email já cadastrado.";
            header("Location: cadastro.php");
        }

        $stmt->close();
        $conn->close();
    } else {
        // Senhas não coincidem
        $_SESSION['cadastro_erro'] = "As senhas não coincidem.";
        header("Location: cadastro.php");
    }
} else {
    header("Location: cadastro.php");
}
?>
