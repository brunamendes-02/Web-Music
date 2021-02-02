<?php
require_once('conectar.php');

$type = $_POST['type'];
$mark = $_POST['mark'];
$price = $_POST['price'];
$description = $_POST['description'];
$imagem=$_FILES['imagem']['tmp_name'];

$price = str_replace(",",".",$price);

$sql= "insert into cadastro (tipo, marca, descricao, valor) values ('$type','$mark','$description',$price)";

mysqli_query($conexao,$sql) or die(mysqli_connect_error());
    $ultimocod=mysqli_insert_id($conexao);
    
        if ($imagem != ''){
         $imagem_type=$_FILES['imagem']['type'];
        if (($imagem_type != 'image/jpeg') && ($imagem_type != 'image/pjpeg') 
        && ($imagem_type != 'image/png') && ($imagem_type != 'image/x-png') 
        && ($imagem_type != 'image/gif')){
             echo "Formato de arquivo inválido !";
        }else{
        $arquivo='../fotos/'.$ultimocod.'.jpg';
        move_uploaded_file($imagem,$arquivo);
        } 
            $msg= urlencode('Instrumento cadastrado com sucesso !');
            header("location: ../php/form_cadastrar.php?retorno=$msg");
        }else{ 
        echo "<br /> Imagem não enviada"; 
        } 
?>   