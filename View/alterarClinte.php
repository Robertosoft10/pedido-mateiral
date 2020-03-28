<?php
session_start();
require_once  '../Dao/clienteDao.php';
$codCliente = $_GET['codCliente'];
$clienteDao = new ClienteDAO();
$listarCliente = $clienteDao->BuscarCliente($codCliente);
$cliente = $listarCliente->fetch(PDO::FETCH_OBJ);
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
       <li><a href="../Dao.logout.php">Sair</a></li>
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
            <form action="../Controller/atualizarCliente.php?codCliente=<?= $cliente->codCliente;?>" method="post">
                <fieldset>
                    <legend>Alterar Cliente</legend>
                        <div class="form-group col-lg-12 col-xs-12">
                          Cliente:
                        <input type="text" class="form-control" id="cliente" name="cliente"
                        value="<?php echo $cliente->cliente;?>">
                        </div>
                        <div class="form-group col-lg-6 col-xs-6">
                          Telefone:
                        <input type="text" class="form-control" id="telefone" name="telefone"
                        value="<?php echo $cliente->telefone;?>">
                        </div>
                        <div class="form-group col-lg-6 col-xs-6">
                          Cpf:
                        <input type="nunber" class="form-control" id="cpf" name="cpf"
                        value="<?php echo $cliente->cpf;?>">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Endereço:
                        <input type="text" class="form-control" id="endereco" name="endereco"
                        value="<?php echo $cliente->endereco;?>">
                         </div>
                         <div class="form-group col-lg-12 col-xs-12">
                        Local da entrega:
                      <textarea type="text" class="form-control" id="local" name="local">
                      <?php echo $cliente->local;?></textarea>
                    </div>
                    <div class="form-group col-lg-12 col-xs-12">
                    <button type="submit" class="btn btn-success col-xs-2">Salvar Alterações</button>
                    <div>
                </fieldset>
            </form>
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
