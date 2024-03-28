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


<link rel="stylesheet" type="text/css" href="../../../CSS/menu_horizontal.css">
<link rel="stylesheet" type="text/css" href="../../../CSS/Input.css">
<link rel="stylesheet" type="text/css" href="../../../CSS/estilo.css"/>
<link rel="stylesheet" type="text/css" href="../../../CSS/forms.css"/>
<link rel="stylesheet" type="text/css" href="../../../CSS/tabla.css"/>
<link rel="stylesheet" type="text/css" href="../../../CSS/menu_H.css">

</head>



<div id="horizontal_menu" class="sidebar">
<img src="../../../Imagenes/LogoDiSur_1.png" alt="campusMVP" style="border-width: 0px" width="100"/>
<!--h1><font size="5"
          face="verdana"
          color="darkgray">Herramientas de Configuración</h1-->


</div>

	
<body>
<br><br>
<nav class="menuCSS3">

		<div id="toggle-menu" class="toggle-menu">
			
			<label for="toggle-menu-checkbox">
				<i class="fa fa-bars" aria-hidden="true"></i>
			</label>
		</div>

		<input type="checkbox" class="toggle-menu__checkbox" id="toggle-menu-checkbox"/>

		<ul id="main-menu" class ="main-menu">
			<li class="main-menu__item"><a class="active" href="../../../Index.php"> Inicio</a></li>
			<li class="main-menu__item"><a href="#">Prescripción</a>
				<ul>
					<li class="item-son1"><a href="../../../prescripcion/prescripcion.php"> Nueva</a></li>
					<li class="item-son1"><a href="../../../prescripcion/consulta_pacientes.php">Consulta</a></li>
				</ul>
			</li>
			<li class="main-menu__item"><a href="#">Catálogos</a>
				<ul>
					<li class="item-son1"><a href="../Configuracion/Catalogos/Prescripcion/cat_cie_10.php">CIE-10</a></li>
					<li class="item-son1"><a href="#">Dispensación</a></li>
					<li class="item-son1"><a href="#">Control de Inventario</a></li>
					<li class="item-son1"><a href="#">Recursos Materiales</a></li>
				</ul>
			</li>
			<li class="main-menu__item"><a href="../funciones/destruir.php"> Salir </a>
				
			</li>
			
		</ul>
</nav>

<div style="width: 1300px; height: auto overflow: scroll;" class="contenedor">
  <div class="titulo" style="font-size: 16px;">Clasificación Estadística Internacional de Enfermedades y Problemas Relacionados con la Salud, versión oficial vigente (CIE-10). 0923<br><br><br>
    <form>
        <div class="row">
          
					<div class="input-group">
          
						<input type="text" name="CIE10" id="CIE10" required>
						<label for="CIE10">Nombre (CIE-10):</label>
					</div>
        </div>
        <div class="row">
          <div>
          
            <input type="submit" onclick = "this.form.action = 'cat_cie_10_Result.php'; this.form.submit()" name="search" value="Buscar...1" class="styled-button-8" />
           
          </div>
				</div>
</form>
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


          $pdoQuery_1 = $conn-> prepare("SELECT * FROM `cat_cie_10`");
          $pdoQuery_1->execute();

          $total_registros=$pdoQuery_1->rowCount();  

          $pdoQuery_1 = $conn-> prepare("SELECT * FROM `cat_cie_10` 
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