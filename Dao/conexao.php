<?php
define( 'SERVIDOR', '127.0.0.1');
define( 'USUARIO', 'root' );
define( 'SENHA', '' );
define( 'BANCO', 'entrega');

$conexao = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . BANCO, USUARIO, SENHA);

try
{
    $conexao = new PDO('mysql:host=' . SERVIDOR . ';dbname=' . BANCO, USUARIO, SENHA);
    $conexao->exec("set names utf8");
}
catch (PDOException $return)
{
    echo 'Erro ao conectar com o MySQL: ' . $return->getMessage();
}
?>
