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
<title>Configuración DiSur</title>

<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">




    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="stylesheet" href="../CSS/menu_H.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>
<body>

<div class="cover">
    <ul>
        <img src="../Imagenes/logo.png" alt="logo">
        <!--li><a href="../Index.php">Inicio</a></li>
        <li><a href="../funciones/destruir.php">Cerrar Sesión</a></li-->
        
    </ul>
        
</div>
    <h1>
        Configuración
    </h1>
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
</body>
</html>