<?php
session_start();
include_once '../Dao/usuarioDao.php';
if(isset($_GET['codUsuario'])){
$objetoUsuario = new Usuario();
$objetoUsuario->setCodUsuario($_GET['codUsuario']);
$objetoUsuario->setUsuario($_POST['usuario']);
$objetoUsuario->setEmail($_POST['email']);
$objetoUsuario->setSenha($_POST['senha']);
$objetoUsuario->setTipo($_POST['tipo']);

$usuarioDAO = new UsuarioDAO();
$usuarioDAO->AtualizarUsuario($objetoUsuario);

    $_SESSION['usuarioAtualizado'] = "Usuário atualizado com sucesso!";
    header('location: ../View/usuarios.php');
}else{
  $_SESSION['usuarioErroAtualizado'] = "Falha na tualização!";
  header('location: ../View/usuarios.php');
}
?>
