<?php
require_once('conectar.php');


$code = $_POST['cod'];

$exclui_foto='../fotos/'.$code.'.jpg';
unlink($exclui_foto);

$sql="delete from cadastro where codigo=$code";
mysqli_query($conexao,$sql) or die (mysql_connect_error());
$msg=urlencode('Registro excluído com sucesso ! ! ! ');
header ("location: ../php/form_excluir.php?retorno=$msg");
?>
