<?php
//Suponiendo que el archivo funciones.php está en la misma carpeta:
session_start();
if(!isset($_SESSION['Usuario'])){
header('Location: ../../Logon_1.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<?php include "../../Includes/scripts.php";?>
<title>ERP DiSur</title>


<link rel="stylesheet" type="text/css" href="../../CSS/menu_horizontal.css">
<link rel="stylesheet" type="text/css" href="../../CSS/Input.css">
<!--link rel="stylesheet" type="text/css" href="../../CSS/estilo.css"/-->
<link rel="stylesheet" type="text/css" href="../../CSS/forms.css"/>

</head>
<body>


<div id="horizontal_menu" class="sidebar">
<img src="../../Imagenes/LogoDiSur_1.png" alt="campusMVP" style="border-width: 0px" width="100"/>
<h1><font size="5"
          face="verdana"
          color="darkgray">Herramientas de Configuración</h1>
<nav id="primary_nav_wrap">

<ul>
  <li class="current-menu-item"><a href="../../Index.php">Inicio</a></li>
  <li><a href="#">Usuarios</a>
    <ul>
      <li><a href="#">Usuarios</a>
        <ul>
          <!--li><a href="#">Deep Menu 1</a>
            <ul-->
            <li><a href="alta_usuarios.php">Alta</a></li>
            <li><a href="consulta_usuarios.php">Consulta</a></li>
              <!--li><a href="#">Modificación</a></li>
              <li><a href="#">Solicitudes</a></li-->
            <!--/ul>
          </li-->
          <!--li><a href="#">Deep Menu 2</a></li-->
        </ul>
      </li>
	  <li><a href="#">Grupos</a>
        <!--ul>
          <li><a href="#">Deep Menu 1</a-->
            <ul>
              <li><a href="#">Alta</a></li>
              <li><a href="#">Consulta</a></li>
              <li><a href="#">Modificación</a></li>
                <li><a href="#">Solicitudes</a></li>
            </ul>
          </li>
          <!--li><a href="#">Deep Menu 2</a></li>
        </ul-->
      </li>
    </ul>
  </li>
  <li><a href="#">Catálogos</a>
    <ul>
      <li class="dir"><a href="#">Prescripción</a></li>
      <li class="dir"><a href="#">Dispensación</a>
        <!--ul>
          <li><a href="#">Category 1</a></li>
          <li><a href="#">Category 2</a></li>
          <li><a href="#">Category 3</a></li>
          <li><a href="#">Category 4</a></li>
          <li><a href="#">Category 5</a></li>
        </ul-->
		<li class="dir"><a href="#">Control de Inventario</a>
		<li class="dir"><a href="#">Recursos Materiales</a>
      </li>
    </ul>
  </li>
  <li><a href="../../funciones/destruir.php">Salir</a>
</ul>
</nav>

</div>
<br><br>


<div class="contenedor">
	<br>
	
	    <div class="title" align="center">  Consulta Usuario</div>
		<br>
		
<body>

<?php
        try{
            include('../../CNX/cnxon.php');
        
            $pdoQuery_1 = $conn-> prepare("SELECT * FROM `tbl_usuarios` WHERE id= $_REQUEST[ID]");
            $pdoQuery_1->execute();
            $reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC);
        }catch (Excepton $e){
            die('Error:'. $e->getMessage());
        }


?>

<div class="hero">
		<form action="modificaregistro_update.php" method="post">
			
		<!--div id="encabezado"-->
			
			<!--label-->
			 <br>
			 
			 
				<div class="row">
					
					<div class="input-group">
						
						<input type="text" name="Id" value="<?php echo $reg['id']; ?>" readonly>
						<!--label for="Id">Id:</label-->
					</div>
                    <div class="input-group">
						
						<input type="text" name="User" value="<?php echo $reg['usuario']; ?>" required>
						<label for="User">Usuario:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-group">				
						<input type="Password" id="PWD" name= "PWD" value="<?php echo $reg['password']; ?>" required>
						<label for="PWD" >Contraseña:</label>
					</div>	
					
					<div class="input-group">					
						<input type="Password" id="PWD_2" name= "PWD_2" value="<?php echo $reg['password']; ?>" required>
						<label for="PWD_2">Confirmar contraseña:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-group">
						<input type="text" id="nombre" name="nombre" value="<?php echo $reg['nombre']; ?>" required>
						<label for="nombre">Nombre:</label>
					</div>
				</div>	
				<div class="row">
					<div class="input-group">		
						<input type="text" id="Ap_Paterno" name="Ap_Paterno" value="<?php echo $reg['apaterno']; ?>" required>
						<label for="Ap_Paterno">Apellido Paterno:</label>
					</div>	
				
					<div class="input-group">
						<input type="text" id="Ap_Materno" name="Ap_Materno" value="<?php echo $reg['amaterno']; ?>" required>
						<label for="Ap_Materno">Apellido Materno:</label>
					</div>
				</div>
				<div class="row">
					<div class="input-group">				
						<input type="text" id="DISUR_ID" name="DISUR_ID" value="<?php echo $reg['expediente']; ?>" required>
						<label for="DISUR_ID">Disur ID:</label>
					</div>	
					
					<div class="input-group">
						<input type="email" id="e_mail" name="e_mail" value="<?php echo $reg['email']; ?>" required>
						<label for="e_mail">e-mail:</label>
					</div>							
				</div>
				<div class="row">
					<div class="input-group">
						<input type="text" id="Location" name="Location" value="<?php echo $reg['sucursal']; ?>" required>
						<label for="Location">Sucursal:</label>
					</div>		
					
				</div>
				
				<input type = "submit" value = Actualizar class="styled-button-8"/>
			
		<!--/div-->
</div>

</form>
</div>
</body>
</html>