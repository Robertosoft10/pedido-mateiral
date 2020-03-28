<?php
include_once 'Dao/conexao.php';
$sql = $conexao->prepare("INSERT INTO usuarios(usuario, email, senha, tipo)
VALUES('Admim', 'admin@gmail.com', sha1(12345), 'Admin')");
 $sql->execute();
 header('location: index.php');
 ?>
