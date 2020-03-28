<?php
session_start();
include_once '../Dao/produtoDao.php';

if(isset($_GET['codProduto'])){

$objetoProduto = new Produto();
$objetoProduto->setCodProduto($_GET['codProduto']);
$objetoProduto->setProduto($_POST['produto']);
$objetoProduto->setCodigo($_POST['codigo']);
$objetoProduto->setPreco($_POST['preco']);
$objetoProduto->setDescricao($_POST['descricao']);

$produtoDAO = new ProdutoDAO();
$produtoDAO->AtualizarProduto($objetoProduto);

$_SESSION['produtAtualizado'] = "Produto atualizado com sucesso!";
header('location: ../View/produtos.php');
}else{
 $_SESSION['produtErroAtualiza'] = "Falha na atualização!";
header('location: ../View/produtos.php');
}
?>
