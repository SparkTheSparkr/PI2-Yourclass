<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['nome']) && isset($_POST['email']) && isset($_POST['telefone']) && isset($_POST['endereco']) && isset($_POST['cartao']) && isset($_POST['validade']) && isset($_POST['cvv'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $telefone = $_POST['telefone'];
        $endereco = $_POST['endereco'];
        $cartao = $_POST['cartao'];
        $validade = $_POST['validade'];
        $cvv = $_POST['cvv'];


        if (validarDados($nome, $email, $telefone, $endereco, $cartao, $validade, $cvv)) {
            $_SESSION['compra_sucesso'] = true;
            header("Location: confirmacao.php");
            exit();
        } else {
            echo '<script>alert("Por favor, preencha todos os campos corretamente."); window.history.back();</script>';
            exit();
        }
    } else {
        echo '<script>alert("Por favor, preencha todos os campos."); window.history.back();</script>';
        exit();
    }
} else {
    header("Location: index.php");
    exit();
}


function validarDados($nome, $email, $telefone, $endereco, $cartao, $validade, $cvv) {

    if (!empty($nome) && !empty($email) && !empty($telefone) && !empty($endereco) && !empty($cartao) && !empty($validade) && !empty($cvv)) {
        return true;
    }
    return false;
}
?>
