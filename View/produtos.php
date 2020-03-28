<?php
session_start();
require_once  '../Dao/produtoDao.php';
$produtoDao = new ProdutoDAO();
$produtos = $produtoDao->ListarProdutos();
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
          <?php if(isset($_SESSION ['produtSalvo'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['produtSalvo'];?>
          </div>
          <?php unset($_SESSION ['produtSalvo']); } ?>

          <?php if(isset($_SESSION ['produtErro'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['produtErro'];?>
          </div>
          <?php unset($_SESSION ['produtErro']); } ?>

          <?php if(isset($_SESSION ['produtAtualizado'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['produtAtualizado'];?>
          </div>
          <?php unset($_SESSION ['produtAtualizado']); } ?>

          <?php if(isset($_SESSION ['produtErroAtualiza'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['produtErroAtualiza'];?>
          </div>
          <?php unset($_SESSION ['produtErroAtualiza']); } ?>

          <?php if(isset($_SESSION ['produtoDeletado'])){?>
          <div class="alert alert-success" role="alert">
          <?php echo $_SESSION ['produtoDeletado'];?>
          </div>
          <?php unset($_SESSION ['produtoDeletado']); } ?>

          <?php if(isset($_SESSION ['produtoErroDelete'])){?>
          <div class="alert alert-danger" role="alert">
          <?php echo $_SESSION ['produtoErroDelete'];?>
          </div>
          <?php unset($_SESSION ['produtoErroDelete']); } ?>
            <form action="../Controller/incluirProduto.php" method="post">
                <fieldset>
                    <legend>Novo Produto</legend>
                        <div class="form-group col-lg-12 col-xs-12">
                          Produto: *
                        <input type="text" class="form-control" id="produto" name="produto">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Código:
                        <input type="number" class="form-control" id="codigo" name="codigo">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Preço: *
                        <input type="text" class="form-control" id="preco" name="preco">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Descrição:
                        <textarea type="text" class="form-control" id="descricao" name="descricao"></textarea>
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
            <h2 class="panel-title">Lista de Produtos</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " id="dataTables-example">
                <tr>
                    <th>ID</th>
                    <th>Produto</th>
                     <th>Preço</th>
                    <th></th>
                </tr>
              <?php while($produto = $produtos->fetch(PDO:: FETCH_OBJ)){ ?>
                <tr>
                    <td class="col-md-1"><?php echo $produto->codProduto;?></td>
                    <td class="col-md-3"><?php echo $produto->produto;?></td>
                    <td class="col-md-3"><?php echo $produto->preco;?></td>
                    <td class="col-md-2">
                    <a class="btn btn-primary" href="detalheProduto.php?codProduto=<?= $produto->codProduto;?>" role="button">Detalhe</a>
                    <a class="btn btn-info" href="novoPedido.php?acao=addP&codProduto=<?=$produto->codProduto;?>" role="button">Adicionar</a>
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
