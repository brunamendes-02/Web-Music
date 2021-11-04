<!DOCTYPE html>
<html>
 <head>
 <link href="../css/pesquisar-styles.css" rel="stylesheet" type="text/css">
 <meta charset="UTF-8">
 <title>Avaliação php</title>
 </head>
 <body>
   <div class="header-container">
      <a href="../php/principal.php" class="menu-principal">Início</a>
      <a class="menu-item" href="../php/form_cadastrar.php">Cadastrar</a>
      <a class="menu-item" href="../php/form_atualizar.php">Atualizar</a>
      <a class="menu-item" href="../php/form_excluir.php">Excluir</a>
      <a class="menu-item" href="../php/relatorio.php">Relatório</a>
   </div>
    <div class="title-container">     
        <h2 class="page-title">Buscar Instrumentos Musicais</h2>
    </div>

    <form class="form" name="dados" action="form_pesquisar.php" method="POST" enctype="multipart/form-data">
          
        <button class="submit-button">
        <img class="icon" src="../icons/searchIcon.svg" />
          </button>

          <input class="input-form" type="text" name="cod" placeholder="Código" /> 
          <input class="input-form" type="text" name="mark" placeholder="Marca" /> 

        </form>
  <?php

        ini_set( 'display_errors', 0 );
        require_once('./conectar.php');

        $mark = $_POST['mark'];
        $cod = $_POST['cod'];


        if ($mark != "" && $cod != "") {

        $sql = "select * from cadastro where marca='$mark' && codigo=$cod"; 
        $res = mysqli_query($conexao,$sql) or die(mysql_connect_error()); 
        $num = mysqli_num_rows($res);

        if ($num > 0) {
          $linha = mysqli_fetch_row($res);
          $cod = $linha[0];
          $type = $linha[1];
          $mark = $linha[2];
          $description = $linha[3];
          $price = $linha[4];
          $foto = '../fotos/'.$cod.'.jpg';

        $price = str_replace(".",",",$price);

         echo "<di class='input-box'>";
         echo "<div class='res-box'>";
         echo  "<div>";
         echo  "<h2 class='text'>Código: $cod</h2>";
         echo  "<h2 class='text'>Tipo: $type</h2>";
         echo  "<h2 class='text'>Marca: $mark</h2>";
         echo  "<h2 class='text'>Preço: $price</h2>";
         echo  "</div>";
         echo  "<div class='description-content'>";
         echo  "<h2 class='description-text'>Descrição: $description</h2>";
         echo  "<img width='260px' src='$foto' />";
         echo  "</div>";
         echo  "</div>";
         echo  "</div>";
       

        
      } else { 
          echo "<font class='font' color='#D70000' size='4' weight='bold'>"; 
          echo "Instrumento não encontrado...";
          echo "</font>";
        } 
      } else if ($mark === "" && $cod != "") {
        $sql = "select * from cadastro where codigo=$cod"; 
        $res = mysqli_query($conexao,$sql) or die(mysql_connect_error()); 
        $num = mysqli_num_rows($res);

        if ($num > 0) {
          $linha = mysqli_fetch_row($res);
          $cod = $linha[0];
          $type = $linha[1];
          $mark = $linha[2];
          $description = $linha[3];
          $price = $linha[4];
          $foto = '../fotos/'.$cod.'.jpg';

        $price = str_replace(".",",",$price);
         echo "<di class='input-box'>";
         echo "<div class='res-box'>";
         echo  "<div>";
         echo  "<h2 class='text'>Código: $cod</h2>";
         echo  "<h2 class='text'>Tipo: $type</h2>";
         echo  "<h2 class='text'>Marca: $mark</h2>";
         echo  "<h2 class='text'>Preço: $price</h2>";
         echo  "</div>";
         echo  "<div class='description-content'>";
         echo  "<h2 class='description-text'>Descrição: $description</h2>";
         echo  "<img width='260px' src='$foto' />";
         echo  "</div>";
         echo  "</div>";
         echo  "</div>";
       

        
      } else { 
          echo "<font class='font' color='#D70000' size='4' weight='bold'>"; 
          echo "Instrumento não encontrado...";
          echo "</font>";
        }
      } else if ($mark != "" && $cod === ""){
        $sql = "select * from cadastro where marca='$mark'"; 
        $res = mysqli_query($conexao,$sql) or die(mysql_connect_error()); 
        $num = mysqli_num_rows($res);

        if ($num > 0) {
          $linha = mysqli_fetch_row($res);
          $cod = $linha[0];
          $type = $linha[1];
          $mark = $linha[2];
          $description = $linha[3];
          $price = $linha[4];
          $foto = '../fotos/'.$cod.'.jpg';
          $res=mysqli_query($conexao,$sql) or die (mysqli_connect_error());
          $num=mysqli_num_rows($res);
         
        while ($linha = mysqli_fetch_row($res)){
          $linha[4] = str_replace(".",",",$linha[4]);
         echo "<di class='input-box'>";
         echo "<div class='res-box'>";
         echo  "<div>";
         echo  "<h2 class='text'>Código: $linha[0]</h2>";
         echo  "<h2 class='text'>Tipo: $linha[1]</h2>";
         echo  "<h2 class='text'>Marca: $linha[2]</h2>";
         echo  "<h2 class='text'>Preço: $linha[4]</h2>";;
         echo  "</div>";
         echo  "<div class='description-content'>";
         echo  "<h2 class='description-text'>Descrição: $linha[3]</h2>";         
         echo  "<img width='260px' src='$foto' />";
         echo  "</div>";
         echo  "</div>";
         echo  "</div>";
          }

          

      } else { 
          echo "<font class='font' color='#D70000' size='4' weight='bold'>"; 
          echo "Instrumento não encontrado...";
          echo "</font>";
        } 
      }
?>


</body>
</html>