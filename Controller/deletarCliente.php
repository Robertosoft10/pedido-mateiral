<?php
session_start();
include_once '../Dao/clienteDao.php';
if(isset($_GET['codCliente'])){
$codCliente = $_GET['codCliente'];
$ClienteDAO = new ClienteDAO();

$ClienteDAO->DeleteCliente($codCliente);

$_SESSION['clienteDeletado'] = "Cliente deletado com sucesso!";
    header('location: ../View/clientes.php');
}else{
     $_SESSION['clienteErroDelete'] = "Falha ao deletar!";
    header('location: ../View/clientes.php');
}
?>
