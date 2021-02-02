<!DOCTYPE html>
<html>
 <head>
 <link href="../css/cadastrar-styles.css" rel="stylesheet" type="text/css">
 <meta charset="UTF-8">
 <title>Avaliação php</title>
 </head>
 <body>
   <div class="header-container">
      <a href="../php/principal.php" class="menu-principal">Início</a>
      <a class="marked-menu-item" href="../php/form_cadastrar.php">Cadastrar</a>
      <a class="menu-item" href="../php/form_atualizar.php">Atualizar</a>
      <a class="menu-item" href="../php/form_excluir.php">Excluir</a>
      <a class="menu-item" href="../php/relatorio.php">Relatório</a>
   </div>
    <div class="title-container">     
        <h2 class="page-title">Cadastro de Instrumentos Musicais</h2>
    </div>

    <form name="dados" action="../php/exec_cadastrar.php" method="POST" enctype="multipart/form-data">
    <div class="aling-form">

      <div class="sub-form-container">
          <input name="type" class="input" type="text"  placeholder="Tipo" /> 
          <input name="mark" class="input" type="text"  placeholder="Marca" /> 
          <input name="price" class="input" type="text"  placeholder="Valor" /> 
      </div>
      <div class="second-sub-form-container">
          <input name="description" class="description-input" type="text"  placeholder="Descrição" /> 
          <input name="imagem" class="upload-input" type="file"  placeholder="Upload"/>  
         </div>
    </div>
          
          <button type="submit" class="submit-button">
           <h2 class="submit-button-text">
           Salvar
           </h2>  
          </button>
        </form>
        <?php
        if (isset ($_GET['retorno'])) {
            $msg = $_GET['retorno'];
          echo "<br />";
          echo "<div class='font-container'>";
          echo "<font size='5' color='#F00'>";
          echo $msg;
            $msg="";
          echo "</font>";
          echo "</div>";
        }
      ?>

</body>
</html>