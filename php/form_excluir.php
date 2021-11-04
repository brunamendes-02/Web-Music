<!DOCTYPE html>
<html>
<head>
<link href="../css/excluir-styles.css" rel="stylesheet" type="text/css">
<meta charset="UTF-8">
<title></title>
</head>
<body>
  <div class="header-container">
      <a href="../php/principal.php" class="menu-principal">Início</a>
      <a class="menu-item" href="../php/form_cadastrar.php">Cadastrar</a>
      <a class="menu-item" href="../php/form_atualizar.php">Atualizar</a>
      <a class="marked-menu-item" href="../php/form_excluir.php">Excluir</a>
      <a class="menu-item" href="../php/relatorio.php">Relatório</a>
   </div>
    <div class="title-container">     
        <h2 class="page-title">Excluir Instrumentos Musicais</h2>
    </div>

    <b> <font color="#F00" class="font" size="4" face="Arial"> Tem certeza que deseja excluir o instrumento? </font> </b>  
  <form class="form" name="dados" action="../php/exec_excluir.php" method="POST">
    <input class="input" type="hidden" name="cod" value="<?php echo $_GET['cod'] ?>" />

    <input class="input" type="text" name="cel" readonly value="<?php if (isset ($_GET['type'])) echo  $_GET['type'] ?>" /> </label>       
    <input class="icon" width="40px" class="icon" type="image" src="../icons/X.svg" name="img_cad" title="Excluir"> 
  </form>



  <?php
    if (isset ($_GET['retorno'])) {
      $msg = $_GET['retorno'];
      echo "<br />";
      echo "<font class='font' face='Arial' size='4' color='#F00'>";
      echo $msg;
      $msg="";
      echo "</font>";
    }
    ?>
  <?php
    require_once('conectar.php');
    $sql="select * from cadastro";
    $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
    $num=mysqli_num_rows($res);
    while ($linha = mysqli_fetch_row($res)){
    $cod=$linha[0];
    $foto = '../fotos/'.$cod.'.jpg';
    $linha[4] = str_replace(".",",",$linha[4]);
      echo "<di class='input-box'>";
      echo "<a class='a' href='form_excluir.php?cod=$cod&&type=$linha[1]'>";
      echo "<div class='res-box'>";
      echo  "<div>";
      echo  "<h2 class='text'>Código: $linha[0]</h2>";
      echo  "<h2 class='text'>Tipo: $linha[1]</h2>";
      echo  "<h2 class='text'>Marca: $linha[2]</h2>";
      echo  "<h2 class='text'>Preço: $linha[4]</h2>";
      echo  "</div>";
      echo  "<div class='description-content'>";
      echo  "<h2 class='description-text'>Descrição: $linha[3]</h2>";             
      echo  "<img width='260px' src='$foto' />";
      echo  "</div>";
      echo  "</div>";
      echo "</a>";
      echo  "</div>";

    }
  ?>



</body>
</html>
