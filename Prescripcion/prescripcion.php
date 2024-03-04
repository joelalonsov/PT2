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
<?php include "../Includes/scripts.php";?>
<title>Alta Usr DiSur</title>

<link rel="stylesheet" type="text/css" href="../CSS/Input.css">
<!--link rel="stylesheet" type="text/css" href="../../CSS/estilo.css"/-->
<link rel="stylesheet" type="text/css" href="../CSS/forms.css"/>
<link rel="stylesheet" href="../CSS/estilos.css">
<link rel="stylesheet" href="../CSS/menu_H.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<body>

<div id="horizontal_menu" class="sidebar">
<img src="../Imagenes/logo.png" alt="logo"/>
<h1>Prescripción</h1>

</div>
<br><br>

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
					<li class="item-son1"><a href="#">Prescripción</a></li>
					<li class="item-son1"><a href="#">Dispensación</a></li>
					<li class="item-son1"><a href="#">Control de Inventario</a></li>
					<li class="item-son1"><a href="#">Recursos Materiales</a></li>
				</ul>
			</li>
			<li class="main-menu__item"><a href="../funciones/destruir.php"> Salir </a>
				
			</li>
			
		</ul>
</nav>
<!--script src="js/scripts.js"></script-->

<!-- Página original abajo:-->

<div class="contenedor">
	<br>
	
	    <div class="title" align="center">Datos del Paciente</div>
		<br>
		
<body>
<main>

		<form class="formulario" id="formulario" action="Guardar_prescripcion.php" method="post">
			
		<!--div id="encabezado"-->
			
			 <br>
			 <!--Folio-->
			 <div class="formulario__grupo" id="grupo__Folio">
			 	<div class="row">
					<div class="input-group">
							
							<div class="formulario__grupo-input">
								<input type="text" class="formulario__input" name="Folio" id="Folio" required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<label for="Folio">Folio:</label>
								
							</div>
						
						<p class="formulario__input-error">El folio debe contener de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
					</div>
				</div>
			</div>
			<!--Contraseña 1-->
			<div class="formulario__grupo" id="grupo__Nombre">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" id="Nombre" name= "Nombre" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Nombre" >Nombre:</label>
						</div>

						<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>	
					
				</div>
			</div>

			<!--Contraseña 2-->
			<div class="formulario__grupo" id="grupo__A_Paterno">
				<div class="row">	
					<div class="input-group">
						<div class="formulario__grupo-input">					
							<input type="text" class="formulario__input" id="A_Paterno" name="A_Paterno" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="A_Paterno">Apellido Paterno:</label>
						</div>

						<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>
				</div>
			</div>
			
			<!--Nombre -->
			<div class="formulario__grupo" id="grupo__A_Materno">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" id="A_Materno" name="A_Materno" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="A_Materno">Apellido Materno:</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>
				</div>
			</div>

			<!--Apellido paterno -->
			<div class="formulario__grupo" id="grupo__Fecha_nac">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">		
							<input type="date" class="formulario__input" id="Fecha_nac" name="Fecha_nac" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Fecha_nac">Fecha de nacimiento:</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener formato fecha.</p>	
					</div>
				</div>
			</div>

			<!--Temperatura -->
			<div class="formulario__grupo" id="grupo__Temperatura">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" id="Temperatura" name="Temperatura"  required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Temperatura">Temperatura (°C):</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener hasta dos enteros y dos decimales.</p>
					</div>
				</div>
			</div>

			<!--Grupo: Presión arterial -->
			<div class="formulario__grupo" id="grupo__P_Arterial">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
							<input type="text" class="formulario__input" id="P_Arterial" name="P_Arterial" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="P_Arterial">Presión arterial:</label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener números razones dentro de los rangos.</p>	
					</div>
				</div>
			</div>

			<!--Grupo: Peso-->
			<div class="formulario__grupo" id="grupo__Peso">	
				<div class="row">	
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<input type="text" class="formulario__input" id="Peso" name="Peso" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Peso">Peso (kg):</label>
						</div>

					<p class="formulario__input-error">El peso solo puede contener hasta tres enteros y dos decimales.</p>
					</div>							
				</div>
			</div>

			<!--Estatura -->
			<div class="formulario__grupo" id="grupo__Estatura">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" id="Estatura" name="Estatura"  required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Estatura">Estatura (m):</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener un número entero y dos decimales.</p>
					</div>
				</div>
			</div>

			<!--Grupo: Frecuencia respiratoria -->
			<div class="formulario__grupo" id="grupo__Frec_resp">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
							<input type="text" class="formulario__input" id="Frec_resp" name="Frec_resp" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Frec_resp">Frecuencia respiratoria (Resp/min):</label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres dígitos.</p>	
					</div>
				</div>
			</div>
			
			<!--Grupo: Ritmo cardiaco -->
			<div class="formulario__grupo" id="grupo__Ritmo_Cardiaco">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
							<input type="text" class="formulario__input" id="Ritmo_Cardiaco" name="Ritmo_Cardiaco" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Ritmo_Cardiaco">Ritmo cardiaco (Latidos/min):</label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
					</div>
				</div>
			</div>

			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<div class="row">
					<input type="submit" value = Guardar class="styled-button-8"/>
					<p class="formulario__mensaje-exito" id="formulario__mensaje-exito">¡Formulario enviado exitosamente!</p>
				</div>
			</div>	
	
</div>


	<!--div class="formulario__mensaje" id="formulario__mensaje">
		<p><i class="fas fa-exclamation-triangle"></i> <b>Error: </b> Favor de llenar el formulario correctamente </p>
	</div-->

	

</form>


	</main>
	<script src="js/formulario.js"></script>

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

	<!--script src="../js/scripts.js"></script-->
</body>
</html>