<?php
session_start();
require_once '../Dao/conexao.php';
$cliente_cod = $_GET['cliente_cod'];
$sql = $conexao->prepare("DELETE FROM pedidos WHERE cliente_cod='$cliente_cod'");
$sql->execute();
if($sql == true){
$_SESSION['pedidoDeletado'] = "Pedido deletado com sucesso!";
    header('location: ../View/pedidos.php');
}else{
     $_SESSION['pedidoErroDelete'] = "Falha ao deletar!";
    header('location: ../View/pedidos.php');
}
?>
