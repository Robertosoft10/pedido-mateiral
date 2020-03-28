<?php
session_start();
require_once  '../Dao/conexao.php';
$sql = $conexao->query("SELECT * FROM pedidos PD JOIN clientes CL ON PD.cliente_cod = CL.codCliente
GROUP BY cliente_cod");
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
          <?php if(isset($_SESSION ['pedidoSalvo'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['pedidoSalvo'];?>
          </div>
          <?php unset($_SESSION ['pedidoSalvo']); } ?>

          <?php if(isset($_SESSION ['pedidoErro'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['pedidoErro'];?>
          </div>
          <?php unset($_SESSION ['pedidoErro']); } ?>

          <?php if(isset($_SESSION ['pedidoDeletado'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['pedidoDeletado'];?>
          </div>
          <?php unset($_SESSION ['pedidoDeletado']); } ?>

          <?php if(isset($_SESSION ['pedidoErroDelete'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['pedidoErroDelete'];?>
          </div>
          <?php unset($_SESSION ['pedidoErroDelete']); } ?>
          <a href="novoPedido.php">
          <button type="submit" class="btn btn-success col-xs-2">Novo Pedido</button></a>
        </div>

        <div class="container">
          <br /> <br />
        </div>
            <div class="container">
            <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class="panel-title">Lista de Pedidos</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " id="dataTables-example">
                <tr>
                    <th>Cliente</th>
                    <th>Valor</th>
                    <th></th>
                </tr>
              <?php while($pedido = $sql->fetch(PDO:: FETCH_OBJ)){ ?>
                <tr>
                    <td class="col-md-3"><?php echo $pedido->cliente;?></td>
                    <td class="col-md-3">R$ <?php echo number_format($pedido->somaValor, 2, ',', ',')?></td>
                    <td class="col-md-3">
                    <a class="btn btn-primary" href="detalhePedido.php?cliente_cod=<?= $pedido->cliente_cod;?>" role="button">Detalhe</a>
                    <a class="btn btn-info" href="detalheProduto.php?cliente_cod=<?= $pedido->cliente_cod;?>" role="button">Adicionar</a>
                    </td>
                </tr>
              <?php } ?>
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
