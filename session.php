<?php 
session_start();
$_SESSION['username'] = $_POST['email'];
$_SESSION['senha'] = $_POST['senha'];

echo $_SESSION['username'];
