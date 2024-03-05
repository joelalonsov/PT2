<?php
//Suponiendo que el archivo funciones.php está en la misma carpeta:
session_start();
if(!isset($_SESSION['Usuario'])){
header('Location: ../Logon_1.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>ERP DiSur</title>


<link rel="stylesheet" type="text/css" href="../CSS/menu_horizontal.css">
<link rel="stylesheet" type="text/css" href="../CSS/Input.css">
<link rel="stylesheet" type="text/css" href="../CSS/estilo.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/forms.css"/>
<link rel="stylesheet" type="text/css" href="../CSS/tabla.css"/>

</head>
<body>


<div id="horizontal_menu" class="sidebar">
<img src="../Imagenes/LogoDiSur_1.png" alt="campusMVP" style="border-width: 0px" width="100"/>
<h1><font size="5"
          face="verdana"
          color="darkgray">Herramientas de Configuración</h1>


</div>
<br><br>
	
<body>

<div style="width: 1300px; height: auto overflow: scroll;" class="contenedor">
<div class="titulo" style="font-size: 16px;">Consulta de Usuarios</div>

<div>
    <table style="width:95%">
        <tr>
          <th style="width:10px">Id</th><th >folio</th><th>Nombre</th><th>Ap. Paterno</th><th>Ap. Materno</th><th>Fecha de Nacimiento</th><th>Modify</th>
        </tr>

        <?php

        try{
          include('../CNX/cnxon.php');

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


          $pdoQuery_1 = $conn-> prepare("SELECT * FROM `tbl_prescripcion`");
          $pdoQuery_1->execute();

          $total_registros=$pdoQuery_1->rowCount();  

          $pdoQuery_1 = $conn-> prepare("SELECT * FROM `tbl_prescripcion`
          ORDER BY `id_receta` ASC
          LIMIT $comienzo, $cant_reg");
          $pdoQuery_1->execute();

          $total_paginas = ceil($total_registros / $cant_reg);

          while($reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC)){
            echo '<tr>';
            echo '<td>';
            echo $reg['id_receta'];
            echo '</td>';
            echo '<td>';
            echo $reg['folio'];
            echo '</td>';
            echo '<td>';
            echo $reg['pac_nombre'];
            echo '</td>';
            echo '<td>';
            echo $reg['pac_A_paterno'];
            echo '</td>';
            echo '<td>';
            echo $reg['pac_A_materno'];
            echo '</td>';
            echo '<td nowrap>';
            echo $reg['fecha_nac'];
            echo '</td>';
            echo '<td>';
            echo '<a href="modificaregistro_pac.php?ID='.$reg['id_receta'].'"><img src="../Imagenes/view.png" height="20" border="0"></a>';
            echo '</td>';
            echo '</tr>';

        }
          
          echo '</table>';

           
          echo '<p>';
            echo $total_registros." Resultados <br>";
            if(($num_pag-1) > 0)
            {
            echo "<a href='consulta_pacientes.php?pagina=".($num_pag-1)."'>< Previous </a>";
            }
              
            for ($i=1; $i<=$total_paginas; $i++)
            {
              if ($num_pag == $i)
              {
              echo "<b><p>Página ".$num_pag."</b> ";
              }
              else
              {
              echo "<a href='consulta_pacientes.php?pagina=$i'>$i</a> ";
              }
            }
            
            if(($num_pag + 1)<=$total_paginas)
            {
            echo "<a href='consulta_pacientes.php?pagina=".($num_pag+1)."'>Next ></a>";
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