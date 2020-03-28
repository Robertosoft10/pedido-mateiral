<?php
session_start();
require_once  '../Dao/produtoDao.php';
$codProduto = $_GET['codProduto'];
$produtoDao = new ProdutoDAO();
$listarProduto = $produtoDao->BuscarProduto($codProduto);
$produto = $listarProduto->fetch(PDO::FETCH_OBJ);
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Pedidos Material</title>
    <link href="../Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
<body>

<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
     <ul class="nav navbar-nav">
       <li><a href="">Bem Vindo: <?php echo $_SESSION['usuario'];?></a></li>
      <li><a href="../Dao/logout.php">Sair</a></li>
        <li><a href="usuarios.php">Usuários</a></li>
        <li><a href="clientes.php">Clientes</a></li>
        <li><a href="produtos.php">Produtos</a></li>
        <li><a href="pedidos.php">Pedidos</a></li>
    </ul>
</div>
</div>
</nav>
<br><br><br>
<div class="container" >
    <h1 id="nome-pagina">Pedidos de Material</h1>
</div>
</div>
        <div class="container">
         	<br /> <br />
        </div>
            <div class="container">
            <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class="panel-title">Detalhe do Produto</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " >
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Preço</th>
                </tr>
                <tr>
                    <td class="col-md-1"><?php echo $produto->codProduto;?></td>
                    <td class="col-md-3"><?php echo $produto->produto;?></td>
                    <td class="col-md-3"><?php echo $produto->preco;?></td>
                </tr>
                <tr>
                    <th>Código</th>
                    <th  colspan="2">Descrição</th>
                </tr>
                <tr>
                    <td class="col-md-1"><?php echo $produto->codigo;?></td>
                    <td class="col-md-3" colspan="2"><?php echo $produto->descricao;?></td>
                </tr>
                <tr>
                    <td class="col-md-12" colspan="3">
                    <a class="btn btn-warning" href="alterarProduto.php?codProduto=<?= $produto->codProduto;?>" role="button">Alterar</a>
                      <a class="btn btn-danger" href="../Controller/deletarProduto.php?codProduto=<?= $produto->codProduto;?>" role="button">Deletar</a>
                      <a class="btn btn-success" href="novoPedido.php?acao=addP&codProduto=<?=$produto->codProduto;?>" role="button">Adicionar</a>
                    </td>
                </tr>
                </table>
</div>
</div>
</div>
<script src="../Bootstrap/vendor/datatables/js/jquery.dataTables.min.js"></script>
<script src="../Bootstrap/vendor/datatables-plugins/dataTables.bootstrap.min.js"></script>
<script src="../Bootstrap/vendor/datatables-responsive/dataTables.responsive.js"></script>
<script>
$(document).ready(function() {
    $('#dataTables-example').DataTable({
        responsive: true
    });
});
</script>
</body>
</html>
