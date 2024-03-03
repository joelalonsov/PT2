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
<img src="../Imagenes/LogoDiSur_1.png" alt="campusMVP" style="border-width: 0px" width="100"/>
<h1><font size="5"
          face="verdana"
          color="darkgray">Herramientas de Configuración</h1>


</div>
<br><br>

<nav class="menuCSS3">

	
		<!--label for="check" class="checkbtn">
		<i class="fa fa-bars" aria-hidden="true"></i>
		</label-->

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
<script src="js/scripts.js"></script>

<!-- Página original abajo:-->

<div class="contenedor">
	<br>
	
	    <div class="title" align="center">Nuevo Usuario</div>
		<br>
		
<body>
<main>

		<form class="formulario" id="formulario" action="Guardar_usr.php" method="post">
			
		<!--div id="encabezado"-->
			
			<!--label-->
			 <br>
			 <!--Usuario-->
			 <div class="formulario__grupo" id="grupo__User">
			 	<div class="row">
					<div class="input-group">
							
							<div class="formulario__grupo-input">
								<input type="text" class="formulario__input" name="User" id="User" required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<label for="User">Usuario:</label>
								
							</div>
						
						<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
					</div>
				</div>
			</div>
			<!--Contraseña 1-->
			<div class="formulario__grupo" id="grupo__password">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="Password" class="formulario__input" id="PWD" name= "PWD" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="PWD" >Contraseña:</label>
						</div>

						<p class="formulario__input-error">La contraseña debe tener una longitud de 4 a 12 dígitos.</p>
					</div>	
					
				</div>
			</div>

			<!--Contraseña 2-->
			<div class="formulario__grupo" id="grupo__password2">
				<div class="row">	
					<div class="input-group">
						<div class="formulario__grupo-input">					
							<input type="Password" class="formulario__input" id="PWD_2" name="PWD_2" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="PWD_2">Confirmar contraseña:</label>
						</div>

						<p class="formulario__input-error">La contraseña no coincide con la anterior.</p>
					</div>
				</div>
			</div>
			
			<!--Nombre -->
			<div class="formulario__grupo" id="grupo__nombre">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" id="nombre" name="nombre" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="nombre">Nombre:</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>
				</div>
			</div>

			<!--Apellido paterno -->
			<div class="formulario__grupo" id="grupo__ap_paterno">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">		
							<input type="text" class="formulario__input" id="Ap_Paterno" name="Ap_Paterno" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Ap_Paterno">Apellido Paterno:</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener letras y espacios.</p>	
					</div>
				</div>
			</div>

			<!--Apellido materno -->
			<div class="formulario__grupo" id="grupo__ap_materno">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<input type="text" class="formulario__input" id="Ap_Materno" name="Ap_Materno"  required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Ap_Materno">Apellido Materno:</label>
						</div>
					
					<p class="formulario__input-error">Solo puede contener letras y espacios.</p>
					</div>
				</div>
			</div>

			<!--Disur Id -->
			<div class="formulario__grupo" id="grupo__Disur_id">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
							<input type="text" class="formulario__input" id="DISUR_ID" name="DISUR_ID" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="DISUR_ID">Disur ID:</label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener letras y espacios.</p>	
					</div>
				</div>
			</div>

			<!--Grupo: Correo electrónico-->
			<div class="formulario__grupo" id="grupo__correo">	
				<div class="row">	
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<input type="email" class="formulario__input" id="e_mail" name="e_mail" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="e_mail">e-mail:</label>
						</div>

					<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guión.</p>
					</div>							
				</div>
			</div>

				<div class="row">
					<div class="input-group">
						<input type="text" class="formulario__input" id="Location" name="Location" required>
						<label for="Location">Sucursal:</label>
					</div>		
					
				</div>
				
				<div class="row">	
					<div class="input-group">
						
					</div>							
				</div>

				<!--Grupo: Teléfono-->
			<div class="formulario__grupo" id="grupo__telefono">	
				<div class="row">	
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<input type="text" class="formulario__input" id="telefono" name="telefono" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="telefono">Teléfono:</label>
						</div>

					<p class="formulario__input-error">El teléfono solo puede conterner números (10 dígitos).</p>
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


	<div class="formulario__mensaje" id="formulario__mensaje">
		<p><i class="fas fa-exclamation-triangle"></i> <b>Error: </b> Favor de llenar el formulario correctamente </p>
	</div>

	

</form>


	</main>
	<script src="../js/formulario.js"></script>

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

	<script src="../js/scripts.js"></script>
</body>
</html>