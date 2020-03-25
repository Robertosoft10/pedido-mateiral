<?php
session_start();
require_once  '../Api/clienteDao.php';
$clienteDao = new ClienteDAO();
$clientes = $clienteDao->ListarClientes();
if(isset($_GET['codCliente'])){
  $codCliente = $_GET['codCliente'];
  $cliente = $clienteDao->BuscarCliente($codCliente);
}
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Locadora</title>
    <link href="../Bootstrap/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  </head>
<body>
  <!--
<nav class="navbar navbar-fixed-top navbar-inverse">
    <div class="container">
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
     <ul class="nav navbar-nav">
        <li><a href="#">Clientes</a></li>
        <li><a href="#">Produtos</a></li>
        <li><a href="#">Pedidos</a></li>
    </ul>
</div>
</div>
</nav>
-->
<br><br><br>
<div class="container" >
    <h1 id="nome-pagina">Pedidos de Material</h1>
</div>
</div>
        <div class="container">
         	<br /> <br />
        </div>
            <div class="container">
            <div class="panel panel-default">
            <div class="panel-heading">
            <h2 class="panel-title">Detalhe do Cliente</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " >
                <tr>
                    <th>Cód</th>
                    <th>Cliente</th>
                     <th>Telefone</th>
                </tr>
                <tr>
                    <td class="col-md-1"><?php echo $cliente->codCliente;?></td>
                    <td class="col-md-3"><?php echo $cliente->cliente;?></td>
                    <td class="col-md-3"><?php echo $cliente->telefone;?></td>
                    <td class="col-md-1">
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
