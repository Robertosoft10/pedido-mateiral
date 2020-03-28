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
if(@count($_SESSION['produtoSession']) == 0){
 }else{
 $somaValor = 0;
 require_once '../Dao/conexao.php';
 foreach($_SESSION['produtoSession'] as $codProduto => $qtdProduto){
   $sqlProduto = $conexao->query("SELECT * FROM produtos WHERE codProduto = '$codProduto'");;
   $linhaP = $sqlProduto->fetch(PDO::FETCH_OBJ);
   $subTotal = $linhaP->preco * $qtdProduto;
   $somaValor += $linhaP->preco * $qtdProduto;
 }
}

foreach($_SESSION['clienteSession'] as $codCliente => $qtdCliente){
foreach($_SESSION['produtoSession'] as $codProduto => $qtdProduto){

  $sql = "INSERT INTO pedidos(cliente_cod, produto_cod, qtdProduto, somaValor)
VALUES(:codCliente, :codProduto, :qtdProduto, :somaValor)";
   $cadastro = $conexao->prepare($sql);
   $cadastro->bindParam(':codCliente', $codCliente);
   $cadastro->bindParam(':codProduto', $codProduto);
   $cadastro->bindParam(':qtdProduto', $qtdProduto);
   $cadastro->bindParam(':somaValor', $somaValor);
   $cadastro->execute();

  }
}
if($cadastro == true){
   $_SESSION['pedidoSalvo'] = "Pedido realizado com sucesso!";
   header('location: ../View/pedidos.php');
}else{
    $_SESSION['pedidoErro'] = "Falha no pedido!";
   header('location: ../View/pedidos.php');
}
?>
