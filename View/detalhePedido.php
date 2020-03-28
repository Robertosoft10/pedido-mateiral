<?php
session_start();
require_once  '../Dao/conexao.php';
$cliente_cod = $_GET['cliente_cod'];
$sql = $conexao->prepare("SELECT * FROM pedidos PD JOIN clientes CL ON PD.cliente_cod = CL.codCliente WHERE cliente_cod='$cliente_cod'");
$sql->execute();
$pedido = $sql->fetch(PDO:: FETCH_OBJ);
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
            <h2 class="panel-title">Detalhe do Pedido</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover">
                <tr>
                    <th>ID</th>
                    <th>Cliente</th>
                    <th>Cpf</th>
                    <th>Telefone</th>
                </tr>
                <tr>
                    <td class="col-md-1"><?php echo $pedido->cliente;?></td>
                    <td class="col-md-5"><?php echo $pedido->cliente;?></td>
                    <td class="col-md-2"><?php echo $pedido->cpf;?></td>
                    <td class="col-md-4"><?php echo $pedido->telefone;?></td>
                </tr>
                <tr>
                  <th   colspan="4">Endereço</th>
                </tr>
                <tr>
                  <td colspan="4"><?php echo $pedido->endereco;?></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                    <th>Código</th>
                    <th>Preço</th>
                </tr>
                <?php
                $sql = $conexao->query("SELECT * FROM pedidos PD JOIN clientes CL ON PD.cliente_cod = CL.codCliente JOIN produtos PT ON PD.produto_cod = PT.codProduto WHERE cliente_cod='$cliente_cod'");
                while($pedidoProd = $sql->fetch(PDO:: FETCH_OBJ)){
                ?>
                <tr>
                    <td class="col-md-1"><?php echo $pedidoProd->codProduto;?></td>
                    <td class="col-md-5"><?php echo $pedidoProd->produto;?></td>
                    <td class="col-md-2"><?php echo $pedidoProd->codigo;?></td>
                    <td class="col-md-4">R$ <?php echo number_format($pedidoProd->preco, 2, ',', '.');?></td>
                </tr>
              <?php } ?>
              <tr>
                  <td colspan="4">
                      <a class="btn btn-danger" href="../Controller/deletarPedido.php?cliente_cod=<?= $pedido->cliente_cod;?>" role="button">Deletar Pedido</a>
                    </td>
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
