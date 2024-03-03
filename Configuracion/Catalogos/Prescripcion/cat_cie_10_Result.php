<?php
//Suponiendo que el archivo funciones.php está en la misma carpeta:
session_start();
if(!isset($_SESSION['Usuario'])){
header('Location: ../../../Logon_1.php');
}
?>
<!DOCTYPE html>
<html>
<head>

      
<title>ERP DiSur</title>


<link rel="stylesheet" type="text/css" href="../../../CSS/Input.css">
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo.css"/>
<link rel="stylesheet" type="text/css" href="../../../CSS/forms.css"/>
<link rel="stylesheet" type="text/css" href="../../../CSS/tabla.css"/>

</head>
<body>


<div id="horizontal_menu" class="sidebar">
<img src="../../../Imagenes/LogoDiSur_1.png" alt="campusMVP" style="border-width: 0px" width="100"/>
<h1><font size="5"
          face="verdana"
          color="darkgray">Herramientas de Configuración</h1>


</div>
<br><br>
	
<body>

<div style="width: 1300px; height: auto overflow: scroll;" class="contenedor">
  <div class="titulo" style="font-size: 16px;">Clasificación Estadística Internacional de Enfermedades y Problemas Relacionados con la Salud, versión oficial vigente (CIE-10). 0923<br><br><br>
    
        
        <div class="row">
          
				</div>

  </div> 
<br>
<div>
    <table style="width:95%">
        <tr>
          <th style="width:10px">Consecutivo</th><th >Letra</th><th>Catalog Key</th><th>No. Caracteres</th><th>Nombre</th><th>Capítulo</th><th>Causa Type</th><th>EPI_CLAVE_DESC</th>
        </tr>

        <?php

        try{
          include('../../../CNX/cnxon.php');

          $cant_reg = 10;
          if (isset($_GET["pagina"]))
          {
            $num_pag = $_GET["pagina"];
            $comienzo = ($num_pag - 1) * $cant_reg;
          }
          else
          {	
            $comienzo = 0;
            $num_pag = 1;
          }


          $pdoQuery_1 = $conn-> prepare("SELECT * FROM `cat_cie_10` WHERE `nombre` LIKE '%$_GET[CIE10]%'");
          $pdoQuery_1->execute();

          $total_registros=$pdoQuery_1->rowCount();  

          $pdoQuery_1 = $conn-> prepare("SELECT * FROM `cat_cie_10` WHERE `nombre` LIKE '%$_GET[CIE10]%'
          ORDER BY `consecutivo` ASC
          LIMIT $comienzo, $cant_reg");
          $pdoQuery_1->execute();

          $total_paginas = ceil($total_registros / $cant_reg);

          while($reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
            echo '<td>';
            echo $reg['consecutivo'];
            echo '</td>';
            echo '<td>';
            echo $reg['letra'];
            echo '</td>';
            echo '<td>';
            echo $reg['catalog_key'];
            echo '</td>';
            echo '<td>';
            echo $reg['no_caracteres'];
            echo '</td>';            
            echo '<td>';
            echo $reg['nombre'];
            echo '</td>';
            echo '<td>';
            echo $reg['capitulo'];
            echo '</td>';
            echo '<td>';
            echo $reg['causa_type'];
            echo '</td>';
            echo '<td>';
            echo $reg['epi_clave_desc'];
            echo '</td>';            
            echo '</tr>';

        }
          
          echo '</table>';

           
          echo '<p>';
            echo $total_registros." Resultados <br>";
            if(($num_pag-1) > 0)
            {
            echo "<a href='cat_cie_10.php?pagina=".($num_pag-1)."'></b>< Previous </a></b>";
            }
              
            for ($i=1; $i<=$total_paginas; $i++)
            {
              if ($num_pag == $i)
              {
              echo "<b><p>Página ".$num_pag."</b><br><br> ";
              }
              else
              {
              echo "<a href='cat_cie_10.php?pagina=$i'>$i</a></b> ";
              }
            }
            
            if(($num_pag + 1)<=$total_paginas)
            {
            echo "<a href='cat_cie_10.php?pagina=".($num_pag+1)."'></b>Next ></a>";
            }
            echo '</p>'; 

        }catch (Excepton $e){
          die('Error:'. $e->getMessage());
        }
          
        ?>


    
</div>

</div>

    
</body>
</html>