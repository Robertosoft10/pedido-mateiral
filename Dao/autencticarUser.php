<?php
session_start();
include_once 'conexao.php';

$email = $_POST['email'];
$senha = $_POST['senha'];
$descrypt = sha1($password);

if (empty($email) || empty($password)){
    $_SESSION['loginVazio'] = "Informe o usuário e a senha";
	header('location: /../pedido-material/index.php');
     exit;
}

 ?>
