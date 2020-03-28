<?php
session_start();
require_once  '../Dao/usuarioDao.php';
$usuarioDao = new UsuarioDAO();
$usuarios = $usuarioDao->ListarUsuarios();
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
          <?php if(isset($_SESSION ['usuarioSalvo'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['usuarioSalvo'];?>
          </div>
          <?php unset($_SESSION ['usuarioSalvo']); } ?>

          <?php if(isset($_SESSION ['usuarioErro'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['usuarioErro'];?>
          </div>
          <?php unset($_SESSION ['usuarioErro']); } ?>

          <?php if(isset($_SESSION ['userExiste'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['userExiste'];?>
          </div>
          <?php unset($_SESSION ['userExiste']); } ?>

          <?php if(isset($_SESSION ['usuarioAtualizado'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['usuarioAtualizado'];?>
          </div>
          <?php unset($_SESSION ['usuarioAtualizado']); } ?>

          <?php if(isset($_SESSION ['usuarioErroAtualizado'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['usuarioErroAtualizado'];?>
          </div>
          <?php unset($_SESSION ['usuarioErroAtualizado']); } ?>

          <?php if(isset($_SESSION ['usuarioDeletado'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['usuarioDeletado'];?>
          </div>
          <?php unset($_SESSION ['usuarioDeletado']); } ?>

          <?php if(isset($_SESSION ['usuarioErroDelete'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['usuarioErroDelete'];?>
          </div>
          <?php unset($_SESSION ['usuarioErroDelete']); } ?>
            <form action="../Controller/incluirUsuario.php" method="post">
                <fieldset>
                    <legend>Novo Usuário</legend>
                        <div class="form-group col-lg-4 col-xs-4">
                          Usuário: *
                        <input type="text" class="form-control" id="usuario" name="usuario"  required="">
                        </div>
                        <div class="form-group col-lg-4 col-xs-4">
                          E-mail: *
                        <input type="text" class="form-control" id="email" name="email"  required="">
                        </div>
                        <div class="form-group col-lg-4 col-xs-4">
                          Senha: *
                        <input type="password" class="form-control" id="senha" name="senha"  required="">
                        </div>
                        <div class="form-group col-lg-4 col-xs-4">
                          Tipo: *
                        <select type="text" class="form-control" id="tipo" name="tipo" required="">
                          <option> </option>
                          <option> Admin</option>
                          <option> Comum</option>
                        </select>
                         </div>
                    <div class="form-group col-lg-8 col-xs-8">
                      <br>
                    <button type="submit" class="btn btn-success col-xs-4">Salvar</button>
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
            <h2 class="panel-title">Lista de Usuários</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " id="dataTables-example">
                <tr>
                    <th>Usuário</th>
                    <th>E-mail</th>
                    <th>Tipo</th>
                    <th></th>
                </tr>
              <?php while($usuario = $usuarios->fetch(PDO:: FETCH_OBJ)){ ?>
                <tr>
                    <td class="col-md-3"><?php echo $usuario->usuario;?></td>
                    <td class="col-md-3"><?php echo $usuario->email;?></td>
                    <td class="col-md-3"><?php echo $usuario->tipo;?></td>
                    <td class="col-md-2">
                    <a class="btn btn-warning" href="alterarUsuario.php?codUsuario=<?= $usuario->codUsuario;?>" role="button">Alterar</a>
                    <a class="btn btn-danger" href="../Controller/deletarUsuario.php?codUsuario=<?= $usuario->codUsuario;?>" role="button">Deletar</a>
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
