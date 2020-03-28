<?php
session_start();
require 'conexao.php';
$email = $_POST['email'];
$senha =  sha1($_POST['senha']);

if (empty($email) || empty($senha))
{
    $_SESSION['loginVazio'] = "Informe o usuário e a senha";
  header('location: /../pedido-material/index.php');
    exit;
}
$sql = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
$login = $conexao->prepare($sql);

$login->bindParam(':email', $email);
$login->bindParam(':senha', $senha);
$login->execute();
$result = $login->fetchAll(PDO::FETCH_ASSOC);

if (count($result) <= 0)
{
  $_SESSION['loginIncorreto'] = "Usuário  ou senha incorreto!";
  header('location: /../pedido-material/index.php');
    exit;
}
$result = $result[0];

$_SESSION['logged_in'] = true;
$_SESSION['codUsuario'] = $result['codUsuario'];
$_SESSION['usuario'] = $result['usuario'];
header('Location: ../View/clientes.php');
?>
