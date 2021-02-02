<?php
require_once('conectar.php');

$code = $_POST['cod'];
$type = $_POST['type'];
$mark = $_POST['mark'];
$price = $_POST['price'];
$description = $_POST['description'];


$price = str_replace(",",".",$price);

$sql="update cadastro set tipo='$type', marca='$mark',descricao='$description', valor=$price where codigo=$code";
mysqli_query($conexao,$sql) or die(mysqli_connect_error());

$msg=urlencode('Instrumento atualizado com sucesso ! ! ! ');
header ("location: ../php/form_atualizar.php?retorno=$msg");
?>