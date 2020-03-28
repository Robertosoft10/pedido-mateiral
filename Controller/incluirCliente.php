<?php
session_start();
include_once '../Dao/clienteDao.php';

if(!empty($_POST['cliente']) && !empty($_POST['telefone']) && !empty($_POST['endereco']) && !empty($_POST['descricao'])){

$objetoCliente = new Cliente();
$objetoCliente->setCliente($_POST['cliente']);
$objetoCliente->setTelefone($_POST['telefone']);
$objetoCliente->setCpf($_POST['cpf']);
$objetoCliente->setEndereco($_POST['endereco']);
$objetoCliente->setDescricao($_POST['descricao']);

$clienteDAO = new ClienteDAO();
$clienteDAO->CadastrarCliente($objetoCliente);

    $_SESSION['clientSalvo'] = "Cliente cadastrado com sucesso!";
    header('location: ../View/clientes.php');
}else{
     $_SESSION['clientErro'] = "Falha! Preencha todos os campos obrigatórios!";
    header('location: ../View/clientes.php');
}
?>
