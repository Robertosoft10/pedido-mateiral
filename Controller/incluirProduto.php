<?php
session_start();
include_once '../Dao/produtoDao.php';

if(!empty($_POST['produto']) && !empty($_POST['preco'])){

$objetoProduto = new Produto();
$objetoProduto->setProduto($_POST['produto']);
$objetoProduto->setCodigo($_POST['codigo']);
$objetoProduto->setPreco($_POST['preco']);
$objetoProduto->setDescricao($_POST['descricao']);

$produtoDAO = new ProdutoDAO();
$produtoDAO->CadastrarProduto($objetoProduto);

$_SESSION['produtSalvo'] = "Produto cadastrado com sucesso!";
header('location: ../View/produtos.php');
}else{
 $_SESSION['produtErro'] = "Falha! Preencha todos os campos obrigatórios!";
header('location: ../View/produtos.php');
}
?>
