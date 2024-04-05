<?php
session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YourClass</title>
</head>
<body>

    <form id="form" action="../session.php" method="post">

        <label for="email">Email: </label>
        <input type="email" name = 'email'><br>

        <label for = "senha">Senha:</label>
        <input type="password" name="senha"><br>

        <input type="submit" name="enviar" id="enviar" value="enviar">
    </form>
    
</body>
</html>
