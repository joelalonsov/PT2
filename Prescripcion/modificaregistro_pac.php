<?php
//Suponiendo que el archivo funciones.php está en la misma carpeta:
session_start();
if(!isset($_SESSION['Usuario'])){
header('Location: ../Logon_1.php');

date_default_timezone_set('America/Mexico_City');
setlocale(LC_ALL,'es_ES');

}
?>
<!DOCTYPE html>
<html>
<head>
<?php include "../Includes/scripts.php";?>
<title>ERP DiSur</title>


<link rel="stylesheet" type="text/css" href="../CSS/Input.css">
<!--link rel="stylesheet" type="text/css" href="../../CSS/estilo.css"/-->
<link rel="stylesheet" type="text/css" href="../CSS/forms.css"/>
<link rel="stylesheet" href="../CSS/estilos.css">
<link rel="stylesheet" href="../CSS/menu_H.css">
<link rel="stylesheet" href="../CSS/modal.css">
<link rel="stylesheet" href="../CSS/modal_med.css">

</head>
<body>


<div id="horizontal_menu" class="sidebar">
<img src="../Imagenes/LogoDiSur_1.png" alt="campusMVP" style="border-width: 0px" width="100"/>
<h1><face="verdana"
          color="darkgray">Prescripción - Modifica registro</h1>
		  <nav class="menuCSS3">

			<div id="toggle-menu" class="toggle-menu">
				
				<label for="toggle-menu-checkbox">
					<i class="fa fa-bars" aria-hidden="true"></i>
				</label>
			</div>

			<input type="checkbox" class="toggle-menu__checkbox" id="toggle-menu-checkbox"/>

			<ul id="main-menu" class ="main-menu">
				<li class="main-menu__item"><a class="active" href="../Index.php"> Inicio</a></li>
				<li class="main-menu__item"><a href="#">Usuarios</a>
					<ul>
						<li class="item-son1"><a href="Usuarios/alta_usuarios.php"> Alta de Usuarios</a></li>
						<li class="item-son1"><a href="Usuarios/consulta_usuarios.php">Consulta de Usuarios</a></li>
					</ul>
				</li>
				<li class="main-menu__item"><a href="#">Catálogos</a>
					<ul>
						<li class="item-son1"><a href="../Configuracion/Catalogos/Prescripcion/cat_cie_10.php">Prescripción</a></li>
						<li class="item-son1"><a href="#">Dispensación</a></li>
						<li class="item-son1"><a href="#">Control de Inventario</a></li>
						<li class="item-son1"><a href="#">Recursos Materiales</a></li>
					</ul>
				</li>
				<li class="main-menu__item"><a href="../funciones/destruir.php"> Salir </a>
					
				</li>
				
			</ul>
</nav>


<section class="modal ">
	<div class="modal__container">
			
			<h2 class="modal__title">Catálogo CIE-10</h2>

			<p id="carga_tabla">
				</table>
			</p>

			<a href="#" class="modal__close">Cerrar</a>
	</div>	
</section>

<section class="modal_med">
	<div class="modal__container_med">
			
			<h2 class="modal__title_med">Catálogo de Medicamentos</h2>

			<p id="carga_tabla_medicamento">
				</table>
			</p>

			<a href="#" class="modal__close_med">Cerrar</a>
	</div>	
</section>


</div>
<br><br>


<div class="contenedor">
	<br>
	
	    <div class="title" align="center"> <h3> Consulta Prescripción </h3></div>
		<br>
		
<body>

<?php
        try{
            include('../CNX/cnxon.php');
        
            $pdoQuery_1 = $conn-> prepare("SELECT * FROM `tbl_prescripcion` WHERE id_receta= $_REQUEST[ID]");
            $pdoQuery_1->execute();
            $reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC);
        }catch (Excepton $e){
            die('Error:'. $e->getMessage());
        }


?>

<main>

		<form class="formulario" id="formulario" action="modificaregistro_update.php" method="post">
			
		<!--div id="encabezado"-->
			
			<!--label-->
			 <br>
			<div class="formulario__grupo" id="grupo__Id_prescripcion">
				<div class="row">
					<div class="input-group">

						<div class="formulario__grupo-input">
							<input type="text" name="Id_prescripcion" id="Id_prescripcion" class="formulario__input" value="<?php echo $reg['id_receta']; ?>" readonly>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
						</div>

					<p class="formulario__input-error">El folio debe contener de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>	
					
					</div>
				</div>
			</div>

			<div class="formulario__grupo" id="grupo__Folio">
				<div class="row">
                    <div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" name="Folio" id="Folio" class="formulario__input" value="<?php echo $reg['folio']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Folio">Folio:</label>
						</div>
						<p class="formulario__input-error">El folio debe contener de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
					</div>				
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__Nombre">
				<div class="row">
					<div class="input-group">	
						<div class="formulario__grupo-input">			
							<input type="text" id="Nombre" name= "Nombre" class="formulario__input" value="<?php echo $reg['pac_nombre']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Nombre" >Nombre:</label>
						</div>
						<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>	

				</div>
			</div>		
			
			
			<div class="formulario__grupo" id="grupo__A_Paterno">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">							
							<input type="text" id="A_Paterno" name="A_Paterno" class="formulario__input" value="<?php echo $reg['pac_A_paterno']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="A_Paterno">Apellido Paterno:</label>
						</div>

						<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__A_Materno">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" id="A_Materno" name="A_Materno" class="formulario__input" value="<?php echo $reg['pac_A_materno']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="A_Materno">Apellido Materno:</label>
						</div>
				<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>
				</div>
			</div>	



			<div class="formulario__grupo" id="grupo__Fecha_nac">	
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">		
							<input type="date-local" id="Fecha_nac" name="Fecha_nac" class="formulario__input" value="<?php echo date("d M,Y", strtotime($reg['fecha_nac'])); ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Fecha_nac"></label>
						</div>
						<p class="formulario__input-error">Solo puede contener formato fecha.</p>	
					</div>	
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__Temperatura">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" id="Temperatura" name="Temperatura" class="formulario__input" value="<?php echo $reg['temperatura']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Temperatura">Temperatura (°C):</label>
						</div>
					<p class="formulario__input-error">Solo puede contener hasta dos enteros y dos decimales.</p>
					</div>
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__P_Arterial">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
							<input type="text" id="P_Arterial" name="P_Arterial" class="formulario__input" value="<?php echo $reg['presion']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="P_Arterial">Presión arterial:</label>
						</div>	
						<p class="formulario__input-error">Solo puede contener números razones dentro de los rangos.</p>	
					</div>
				</div>
			</div>
					

			<div class="formulario__grupo" id="grupo__Peso">	
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<input type="text" id="Peso" name="Peso" class="formulario__input" value="<?php echo $reg['peso']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Peso">Peso (kg):</label>
						</div>

					<p class="formulario__input-error">El peso solo puede contener hasta tres enteros y dos decimales.</p>
					</div>							
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__Estatura">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<input type="text" id="Estatura" name="Estatura" class="formulario__input" value="<?php echo $reg['estatura']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Estatura">Estatura (m):</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener un número entero y dos decimales.</p>
					</div>
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__Frec_resp">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" id="Frec_resp" name="Frec_resp" class="formulario__input" value="<?php echo $reg['frecuencia_resp']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Frec_resp">Frecuencia respiratoria (Resp/min):</label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres dígitos.</p>	
					</div>
				</div>
			</div>


			<div class="formulario__grupo" id="grupo__Ritmo_Cardiaco">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<input type="text" id="Ritmo_Cardiaco" name="Ritmo_Cardiaco" class="formulario__input" value="<?php echo $reg['ritmo_card']; ?>" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Ritmo_Cardiaco">Ritmo cardiaco (Latidos/min):</label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
					</div>
				</div>
			</div>
				
				
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<div class="row">
					<br>	
					<input type = "submit" value = Actualizar class="styled-button-8"/>
					<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Formulario enviado exitosamente!</p>
				</div>
			</div>	

		<!--/div-->

</form>

	</main>
</div>

<script src="js/formulario.js"></script>
	
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	<script src="js/main.js" ></script>	
	<script src="js/main_med.js" ></script>
	<!--script src="../js/scripts.js"></script-->


</body>
</html>