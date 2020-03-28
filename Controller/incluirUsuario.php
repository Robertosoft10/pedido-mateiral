<?php
session_start();

include_once '../Dao/conexao.php';
$email = $_POST['email'];
$sql = $conexao->query("SELECT * FROM usuarios WHERE email='$email'");;
$result = $sql->fetch(PDO::FETCH_ASSOC);

if($result > 1){
    $_SESSION['userExiste'] = "Ops! Usuário com esse email já se encontra cadastrado";
    header('location: ../View/usuarios.php');
}else{
include_once '../Dao/usuarioDao.php';

$objetoUsuario = new Usuario();
$objetoUsuario->setUsuario($_POST['usuario']);
$objetoUsuario->setEmail($_POST['email']);
$objetoUsuario->setSenha(sha1($_POST['senha']));
$objetoUsuario->setTipo($_POST['tipo']);

$usuarioDAO = new UsuarioDAO();
$usuarioDAO->CadastrarUsuario($objetoUsuario);

    $_SESSION['usuarioSalvo'] = "Usuário cadastrado com sucesso!";
    header('location: ../View/usuarios.php');
}
?>
