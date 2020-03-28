<?php
session_start();
include_once '../Dao/usuarioDao.php';
if(isset($_GET['codUsuario'])){
$codUsuario = $_GET['codUsuario'];
$usuarioDAO = new UsuarioDAO();
$usuarioDAO->DeleteUsuario($codUsuario);

$_SESSION['usuarioDeletado'] = "Usuário deletado com sucesso!";
    header('location: ../View/usuarios.php');
}else{
     $_SESSION['usuarioErroDelete'] = "Falha ao deletar!";
    header('location: ../View/usuarios.php');
}
?>
