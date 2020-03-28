<?php
session_start();
require_once  '../Dao/clienteDao.php';
$clienteDao = new ClienteDAO();
$clientes = $clienteDao->ListarClientes();
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Pedido Material</title>
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
          <?php if(isset($_SESSION ['clientSalvo'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['clientSalvo'];?>
          </div>
          <?php unset($_SESSION ['clientSalvo']); } ?>

          <?php if(isset($_SESSION ['clientErro'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['clientErro'];?>
          </div>
          <?php unset($_SESSION ['clientErro']); } ?>

          <?php if(isset($_SESSION ['clienteDeletado'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['clienteDeletado'];?>
          </div>
          <?php unset($_SESSION ['clienteDeletado']); } ?>

          <?php if(isset($_SESSION ['clienteErroDelete'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['clienteErroDelete'];?>
          </div>
          <?php unset($_SESSION ['clienteErroDelete']); } ?>

          <?php if(isset($_SESSION ['clientAtualiza'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['clientAtualiza'];?>
          </div>
          <?php unset($_SESSION ['clientAtualiza']); } ?>

          <?php if(isset($_SESSION ['clientErroAtualiza'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['clientErroAtualiza'];?>
          </div>
          <?php unset($_SESSION ['clientErroAtualiza']); } ?>
            <form action="../Controller/incluirCliente.php" method="post">
                <fieldset>
                    <legend>Novo Cliente</legend>
                        <div class="form-group col-lg-12 col-xs-12">
                          Cliente: *
                        <input type="text" class="form-control" id="cliente" name="cliente">
                        </div>
                        <div class="form-group col-lg-6 col-xs-6">
                          Telefone: *
                        <input type="text" class="form-control" id="telefone" name="telefone">
                        </div>
                        <div class="form-group col-lg-6 col-xs-6">
                          Cpf:
                        <input type="nunber" class="form-control" id="cpf" name="cpf">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Endereço: *
                        <input type="text" class="form-control" id="endereco" name="endereco">
                         </div>
                         <div class="form-group col-lg-12 col-xs-12">
                        Descrição: 
                      <textarea type="text" class="form-control" id="local" name="descricao"></textarea>
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                    <button type="submit" class="btn btn-success col-xs-2">Salvar</button>
                    <div>
                </fieldset>
            </form>
        </div>
        <div class="container">
         	<br /> <br />
        </div>
            <div class="container">
            <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class="panel-title">Lista de Clientes</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " id="dataTables-example">
                <tr>
                    <th>Cód</th>
                    <th>Cliente</th>
                     <th>Telefone</th>
                    <th></th>
                </tr>
              <?php while($cliente = $clientes->fetch(PDO:: FETCH_OBJ)){ ?>
                <tr>
                    <td class="col-md-1"><?php echo $cliente->codCliente;?></td>
                    <td class="col-md-3"><?php echo $cliente->cliente;?></td>
                    <td class="col-md-3"><?php echo $cliente->telefone;?></td>
                    <td class="col-md-1">
                    <a class="btn btn-primary" href="detalheCliente.php?codCliente=<?= $cliente->codCliente;?>" role="button">Detalhe</a>
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
