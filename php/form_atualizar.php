<!DOCTYPE html>
<html>
 <head>
 <link href="../css/atualizar-styles.css" rel="stylesheet" type="text/css">
 <meta charset="UTF-8">
 <title>Avaliação php</title>
 </head>
 <body>
   <div class="header-container">
      <a href="../php/principal.php" class="menu-principal">Início</a>
      <a class="menu-item" href="../php/form_cadastrar.php">Cadastrar</a>
      <a class="marked-menu-item" href="../php/form_atualizar.php">Atualizar</a>
      <a class="menu-item" href="../php/form_excluir.php">Excluir</a>
      <a class="menu-item" href="../php/relatorio.php">Relatório</a>
   </div>
    <div class="title-container">     
        <h2 class="page-title">Atualizar Instrumentos Musicais</h2>
    </div>

    <form name="dados" action="../php/exec_atualizar.php" method="POST" enctype="multipart/form-data">
    <div class="aling-form">
    <input class="input" type="hidden" name="cod" value="<?php echo $_GET['cod'] ?>" />
      <div class="sub-form-container">
          <input class="input" type="text" name="type" placeholder="Tipo" value="<?php if (isset ($_GET['type'])) echo  $_GET['type'] ?>" /> 
          <input class="input" type="text" name="mark" placeholder="Marca" value="<?php if (isset ($_GET['mark'])) echo  $_GET['mark'] ?>"/> 
          <input class="input" type="text" name="price" placeholder="Valor" value="<?php if (isset ($_GET['price'])) echo  $_GET['price'] ?>"/> 
         
      </div>
      <div class="second-sub-form-container">
          <input class="description-input" type="text" name="description" placeholder="Descrição" value="<?php if (isset ($_GET['description'])) echo  $_GET['description'] ?>"/> 
          <button  name="img_cad" title="Excluir" class="submit-button">
           <h2 class="submit-button-text">
           Salvar
           </h2>  
          </button>
         </div>
    </div>
          
        </form>

<?php
    if (isset ($_GET['retorno'])) {
      $msg = $_GET['retorno'];
      echo "<br />";
      echo "<div class='font-container'>";
      echo "<font face='Arial' size='3' color='#F00'>";
      echo $msg;
      $msg="";
      echo "</font>";
      echo "</div>";
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
      echo "<a class='a' href='form_atualizar.php?cod=$cod&&type=$linha[1]&&mark=$linha[2]&&description=$linha[3]&&price=$linha[4]'>";
      echo "<div class='res-box'>,";
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