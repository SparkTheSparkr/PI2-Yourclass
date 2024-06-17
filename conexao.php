<?php
$servername = "143.106.241.3";
$username = "cl203143";
$password = "cl*25022008";
$dbname = "cl203143";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
$conn->set_charset("utf8");

?>