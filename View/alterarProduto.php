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

            <form action="../Controller/atualizarProduto.php?codProduto=<?= $produto->codProduto;?>" method="post">
                <fieldset>
                    <legend>Alterar Produto</legend>
                        <div class="form-group col-lg-12 col-xs-12">
                          Produto:
                        <input type="text" class="form-control" id="produto" name="produto"
                        value="<?php echo $produto->produto;?>">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Código:
                        <input type="number" class="form-control" id="codigo" name="codigo"
                        value="<?php echo $produto->codigo;?>">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Preço:
                        <input type="text" class="form-control" id="preco" name="preco"
                        value="<?php echo $produto->preco;?>">
                        </div>
                        <div class="form-group col-lg-12 col-xs-12">
                          Descrição:
                        <textarea type="text" class="form-control" id="descricao" name="descricao"><?php echo $produto->descricao;?></textarea>
                        </div>
                    <div class="form-group col-lg-12 col-xs-12">
                    <button type="submit" class="btn btn-success col-xs-2">Salvar Alterações</button>
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
