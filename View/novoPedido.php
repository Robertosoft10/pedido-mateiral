<?php
session_start();
ini_set('display_errors', 0 );
error_reporting(0);

require_once '../Dao/conexao.php';

if(isset($_SESSION['clienteSession'])){
}else{
    $_SESSION['clienteSession'] = array();
}

if(isset($_GET['addC'])){
    $cliente = $_GET['addC'];
    $_SESSION['clienteSession'][$cliente] = 1;
}
if(isset($_GET['deleteC'])){
    $deleteC = $_GET['deleteC'];
    unset($_SESSION['clienteSession'][$deleteC]);
}
// session produto
    if(!isset($_SESSION['produtoSession'])){
        $_SESSION['produtoSession'] = array();
    }
    // adicionar produto
    if(isset($_GET['acao'])){
      //adiconar produtos ao pedido
      if($_GET['acao'] == 'addP'){
          $codProduto = intval($_GET['codProduto']);
          if(!isset($_SESSION['produtoSession'][$codProduto])){
              $_SESSION['produtoSession'][$codProduto] = 1;
          }else{
            $_SESSION['produtoSession'][$codProduto] += 1;
          }
      }
      // remover produtos
      if($_GET['acao'] == 'deleleP'){
          $codProduto = intval($_GET['codProduto']);
          if(isset($_SESSION['produtoSession'][$codProduto])){
            unset($_SESSION['produtoSession'][$codProduto]);
          }
      }
      // alterar
      if($_GET['acao'] == 'atualizarP'){
          if(is_array(@$_POST['atualizar'])){
            foreach($_POST['atualizar'] as $codProduto => $qtdProduto) {
              $codProduto = intval($codProduto);
              $qtdProduto = intval($qtdProduto);
              if(!empty($qtdProduto) || $qtdProduto <> 0){
                $_SESSION['produtoSession'][$codProduto] = $qtdProduto;
              }else{
                unset($_SESSION['produtoSession'][$codProduto]);
              }
            }
          }
      }
      if($_GET['acao'] == 'cancelarP'){
          unset($_SESSION['produtoSession']);
      }
}
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
         	<br /> <br />
        </div>
            <div class="container">
            <div class="panel panel-primary">
            <div class="panel-heading">
            <h2 class="panel-title">Pedido</h2>
            </div>
            <div class="panel-body">
                <table class="table table-hover " >
                <tr>
                    <div class="form-group col-lg-12 col-xs-12">
                  <a href="clientes.php">
                  <button class="btn btn-info">Adicionar o Cliente</button></a>
                    <a href="produtos.php"><button class="btn btn-success">Adicionar Produtos</button></a>
                    <div><hr>
                      <?php
                      if(count($_SESSION['clienteSession']) == 0){
                      }else{
                          require_once '../Dao/conexao.php';
                          foreach($_SESSION['clienteSession'] as $codCliente => $qtdCliente){
                            $sqlCliente = $conexao->query("SELECT * FROM clientes WHERE codCliente = '$codCliente'");;
                            $linhaC = $sqlCliente->fetch(PDO::FETCH_OBJ);
                            ?>
                      <strong>Cliente:</strong> <?php echo $linhaC->cliente;?>
                      <a href="?deleteC=<?= $codCliente;?>"><button class="btn btn-danger pull-right">Remover</button></a>
                      <?php
                          }
                      }
                      ?>
                    <th>Produto</th>
                    <th>Preço</th>
                    <th>Quantidade</th>
                    <th>Sub-Total</th>
                    <th></th>
                </tr>
                <tr>
                </thead>
                  <form  action="?acao=atualizarP" method="post">
                  <tfoot>
                   <tr>
                  <td colspan="5">
                    <?php
                    if(@count($_SESSION['produtoSession']) == 0){
                     }else{
                     $somaValor = 0;
                     require_once '../Dao/conexao.php';
                     foreach($_SESSION['produtoSession'] as $codProduto => $qtdProduto){
                       $sqlProduto = $conexao->query("SELECT * FROM produtos WHERE codProduto = '$codProduto'");;
                       $linhaP = $sqlProduto->fetch(PDO::FETCH_OBJ);
                       $subTotal = $linhaP->preco * $qtdProduto;
                       $somaValor += $linhaP->preco * $qtdProduto;
                       echo '<tr>
                        <td class="col-lg-3 col-xs-3">'.$linhaP->produto.'</td>
                        <td  class="col-lg-2 col-xs-2">R$ '.number_format($linhaP->preco, 2, ',', '.').'</td>
                        <td  class="col-lg-1 col-xs-1"><input class="form-control" type="text"  name="atualizar['.$codProduto.']" value="'.$qtdProduto.'"></td>
                        <td  class="col-lg-2 col-xs-2">R$ '.number_format($subTotal, 2, ',', '.').'</td>
                        <td  class="col-lg-2 col-xs-2"><a  class="btn btn-danger pull-right" href="?acao=deleleP&codProduto='.$codProduto.'">Remover</a></td>
                         </tr>';
                   }
                 }
                   ?>
                   </tr>
                   <tr>
                   <td colspan="3"><strong class="pull-right">Valor do Pedido</strong></td>
                  <td  colspan="2"><strong>R$ <?php echo number_format(@$somaValor, 2, ',', '.');?></strong></td>
                  </tr>
                  <tr>
                  <td colspan="2">
                    <button  class="btn btn-warning pull-right">Atualizar Qtd</button>
                  </td>
                </form>
                 <td>
                   <form action="" method="post">
                <button  class="btn btn-success" name="fimPedido">Finalizar Pedido</button>
              </form>
                 </td>
                 <td>
                <form  action="?acao=cancelarP" method="post">
                <button  class="btn btn-danger" name="fimPedido">Lampar Pedido</button>
              </form>
                 </td>
                 </tr>
                </table>
                <?php
                if(isset($_POST['fimPedido'])){
                  foreach($_SESSION['clienteSession'] as $codCliente => $qtdCliente){
                  foreach($_SESSION['produtoSession'] as $codProduto => $qtdProduto){

                    $sql = "INSERT INTO pedidos(codCliente, codProduto, qtdProduto, somaValor)
                  VALUES(:codCliente, :codProduto, :qtdProduto, :somaValor)";
                     $cadastro = $conexao->prepare($sql);
                     $cadastro->bindParam(':codCliente', $codCliente);
                     $cadastro->bindParam(':codProduto', $codProduto);
                     $cadastro->bindParam(':qtdProduto', $qtdProduto);
                     $cadastro->bindParam(':somaValor', $somaValor);
                     $cadastro->execute();

                    }
                  }
                }
                if(isset($cadastro) == true){
                  $_SESSION ['pedidoRealizado'] = "Pedido realizado com sucesso!";
                  header('location: ../View/pedidos.php');
                }
                 ?>
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
