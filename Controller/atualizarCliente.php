<?php
session_start();
include_once '../Dao/clienteDao.php';

if(isset($_GET['codCliente'])){

$objetoCliente = new Cliente();
$objetoCliente->setCodCliente($_GET['codCliente']);
$objetoCliente->setCliente($_POST['cliente']);
$objetoCliente->setTelefone($_POST['telefone']);
$objetoCliente->setCpf($_POST['cpf']);
$objetoCliente->setEndereco($_POST['endereco']);
$objetoCliente->setLocal($_POST['local']);

$clienteDAO = new ClienteDAO();
$clienteDAO->AtualizarCliente($objetoCliente);

    $_SESSION['clientAtualiza'] = "Cliente cadastrado com sucesso!";
    header('location: ../View/clientes.php');
}else{
     $_SESSION['clientErroAtualiza'] = "Falha! Preencha todos os campos obrigatórios!";
    header('location: ../View/clientes.php');
}
?>
