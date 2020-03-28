<?php
session_start();
include_once '../Dao/produtoDao.php';
if(isset($_GET['codProduto'])){
$codProduto = $_GET['codProduto'];
$produtoDAO = new ProdutoDAO();

$produtoDAO->DeleteProduto($codProduto);

$_SESSION['produtoDeletado'] = "Produto deletado com sucesso!";
    header('location: ../View/produtos.php');
}else{
     $_SESSION['produtoErroDelete'] = "Falha ao deletar!";
    header('location: ../View/produtos.php');
}
?>
