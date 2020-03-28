<?php
session_start();
$_SESSION['logged_in'] = false;
session_destroy();
header('location: /../pedido-material/index.php');
  exit;
  ?>
