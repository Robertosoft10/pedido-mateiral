<?php
session_start();
require_once  '../Dao/usuarioDao.php';
$codUsuario = $_GET['codUsuario'];
$usuarioDao = new UsuarioDAO();
$listarUsuario = $usuarioDao->BuscarUsuario($codUsuario);
$usuario = $listarUsuario->fetch(PDO::FETCH_OBJ);
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
            <form action="../Controller/atualizarUsuario.php?codUsuario=<?= $usuario->codUsuario;?>" method="post">
                <fieldset>
                    <legend>Novo Usuário</legend>
                        <div class="form-group col-lg-4 col-xs-4">
                          Usuário:
                        <input type="text" class="form-control" id="usuario" name="usuario"  value="<?php echo $usuario->usuario;?>">
                        </div>
                        <div class="form-group col-lg-4 col-xs-4">
                          E-mail:
                        <input type="text" class="form-control" id="email" name="email"
                        value="<?php echo $usuario->email;?>">
                        </div>
                        <div class="form-group col-lg-4 col-xs-4">
                          Informe uma nova senha ou senha atual:
                        <input type="password" class="form-control" id="senha" name="senha"  required="">
                        </div>
                        <div class="form-group col-lg-4 col-xs-4">
                          Tipo:
                        <select type="text" class="form-control" id="tipo" name="tipo" required="">
                          <option><?php echo $usuario->tipo;?></option>
                          <option> Admin</option>
                          <option> Comum</option>
                        </select>
                         </div>
                    <div class="form-group col-lg-8 col-xs-8">
                      <br>
                    <button type="submit" class="btn btn-success col-xs-4">Salvar Alterações</button>
                    <div>
                </fieldset>
            </form>
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
