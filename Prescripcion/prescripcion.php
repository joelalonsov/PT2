<?php
//Suponiendo que el archivo funciones.php está en la misma carpeta:
session_start();
if(!isset($_SESSION['Usuario'])){
header('Location: ../Logon_1.php');
include('../CNX/cnxon.php');

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
<link rel="stylesheet" href="../CSS/modal.css">
<link rel="stylesheet" href="../CSS/modal_med.css">


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
			<li class="main-menu__item"><a href="#">Prescripción</a>
				<ul>
					<li class="item-son1"><a href="prescripcion.php"> Nueva</a></li>
					<li class="item-son1"><a href="consulta_pacientes.php">Consulta</a></li>
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


<div class="contenedor">
	<br>
	
	    <div class="title" align="center"><h3>Datos del Paciente</h3></div>
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
							<p>Fecha de nacimiento:</p>	
							<input type="date" class="formulario__input" id="Fecha_nac" name="Fecha_nac" required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="Fecha_nac"></label>
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


<h3>Padecimiento  CIE-10</h3> <br><br>
	
<!--fieldset-->
<!--Grupo: Busqueda por CIE-10 -->
<br><br>
			<div class="formulario__grupo" id="grupo__CIE10">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
							
						<input type="text" class="formulario__input" name="CIE10" id="CIE10" onchange="llena_tabla()" >

						<script type=text/javascript>
							function llena_tabla(){
								let cie_10=document.getElementById("CIE10").value;	
								console.log(cie_10);
								var elemento = document.getElementById("tabla_CIE_10");
									if (elemento==null) {
										// El elemento no existe
										console.log("No Existe");
										var tabla = document.createElement("table");
										tabla.setAttribute("id", "tabla_CIE_10");
										document.body.appendChild(tabla);
									} else {
										// El elemento existe
										console.log("Existe ¿Pero donde se crea?");
									}
							
								fetch('tabla_cie.php?cie__10='+cie_10)
									.then(response=>response.text())
									.then(value=>{
										document.getElementById('carga_tabla').innerHTML=value
										ContenidoTabla();
									});
							}
							
							function ContenidoTabla() {

									var tabla = document.getElementById("tabla_CIE_10");

									if(tabla){

									tabla.addEventListener("click", function(event) {
										if (event.target.tagName === "TD") {
											var celdas = tabla.getElementsByTagName("td");
											for (var i = 0; i < celdas.length; i++) {
												celdas[i].classList.remove("selected");
											}

											event.target.classList.add("selected");

											var fila = event.target.parentNode; // Obtener la fila que contiene la celda seleccionada
											var contenidoCelda1 = fila.cells[0].textContent; // Contenido de la primera celda en la fila
											var contenidoCelda2 = fila.cells[1].textContent; // Contenido de la segunda celda en la fila

											console.log("Contenido de la primera celda en la fila:", contenidoCelda1);
											console.log("Contenido de la segunda celda en la fila:", contenidoCelda2);

											// Obtener la casilla de verificación por su ID
											var checkbox = document.getElementById('cb-Padecimiento_Secundario');

											// Verificar si está seleccionada
											if (checkbox.checked) {
												document.getElementById('cie_10_id_2').value = contenidoCelda1;
												document.getElementById('cie_10_desc_2').value = contenidoCelda2;
											} else {
												document.getElementById('cie_10_id').value = contenidoCelda1;
												document.getElementById('cie_10_desc').value = contenidoCelda2;
											}
										}
											// Borrar el contenido de input
											var input = document.getElementById("CIE10");

											// Establece el valor del input a una cadena vacía
											input.value = "";
									});
									}
								}
					</script>

							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="CIE10">Busqueda por palabras clave:</label>	

						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
					</div>
				</div>
			</div>
		
			<!--Grupo: vacío -->
			<div class="formulario__grupo" id="grupo__vacio">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">				
						<a href="#" class="hero__cta">Buscar</a> 
						</div>
						<div class="formulario__grupo-input">				
							<label><input type="checkbox" name="cb-Padecimiento_Secundario" id="cb-Padecimiento_Secundario"> Padecimiento Secundario</label><br>
							
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
					</div>
				</div>
			</div>
			
<!--/fieldset-->	



<fieldset>
<legend>Padecimiento Principal</legend>

	
			<!--Grupo: CIE-10 Id -->
			<div class="formulario__grupo" id="grupo__CIE_10_Id">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">
							<p>Código CIE 10:</p>				
							<input type="text" class="formulario__input" id="cie_10_id" name="cie_10_id"  readonly required>
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<label for="cie_10_id"></label>
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
					</div>
				</div>
			</div>

			<!--Grupo: CIE-10 Descripción -->
			<div class="formulario__grupo" id="grupo__CIE_10_Descripcion">
				<div class="row">
					<div class="input-group">
						<div class="formulario__grupo-input">	
							<textarea class="estilotextarea" id="cie_10_desc" name="cie_10_desc" rows="5" readonly></textarea>			
							<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
							<i class="formulario__validacion-estado fas fa-times-circle"></i>
							<!--label for="cie_10_desc">Descripción:</label-->
						</div>
						
					<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
					</div>
				</div>
			</div>
			</fieldset>


			<fieldset>
			<legend>Padecimiento Secundario</legend>
			

			<!--Grupo: Check Box Padecimiento secundario -->
			

			
			<!--Grupo: Cat. CIE-10 -->
			<div class="formulario__grupo" id="grupo__Padecimiento_Secundario">
			<!--Grupo: CIE-10 Id -->
				<div class="formulario__grupo" id="grupo__CIE_10_Id_secundario">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Código CIE 10:</p>				
								<input type="text" class="formulario__input" id="cie_10_id_2" name="cie_10_id_2"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<label for="cie_10_id"></label>
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

				<!--Grupo: CIE-10 Descripción -->
				<div class="formulario__grupo" id="grupo__CIE_10_Descripcion_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">	
								<textarea class="estilotextarea" id="cie_10_desc_2" name="cie_10_desc_2" rows="5" readonly></textarea>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			</div>
				
			</fieldset>
			


			<h3>Medicamentos</h3> <br><br>
	
	<!--fieldset-->
	<!--Grupo: Busqueda por Medicamentos -->
	<br><br>
				<div class="formulario__grupo" id="grupo__BuscaMed">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">				
								
							<input type="text" class="formulario__input" name="BuscaMed" id="BuscaMed" onchange="llena_tabla_med()" >
	
							<script type=text/javascript>
								function llena_tabla_med(){
									let medicamento=document.getElementById("BuscaMed").value;	
									console.log(BuscaMed);
									var elemento = document.getElementById("tabla_Medicamento");
										if (elemento==null) {
											// El elemento no existe
											console.log("No Existe");
											var tabla = document.createElement("table");
											tabla.setAttribute("id", "tabla_Medicamento");
											document.body.appendChild(tabla);
										} else {
											// El elemento existe
											console.log("Existe ¿Pero donde se crea?");
										}
								
									fetch('tabla_medicamento.php?medicamento='+medicamento)
										.then(response=>response.text())
										.then(value=>{
											document.getElementById('carga_tabla_medicamento').innerHTML=value
											ContenidoTabla_med();
										});
								}
								
								function ContenidoTabla_med() {
	
										var tabla = document.getElementById("tabla_Medicamento");
	
										if(tabla){
	
										tabla.addEventListener("click", function(event) {
											if (event.target.tagName === "TD") {
												var celdas = tabla.getElementsByTagName("td");
												for (var i = 0; i < celdas.length; i++) {
													celdas[i].classList.remove("selected");
												}
	
												event.target.classList.add("selected");
	
												var fila = event.target.parentNode; // Obtener la fila que contiene la celda seleccionada
												var contenidoCelda1 = fila.cells[0].textContent; // Contenido de la primera celda en la fila
												var contenidoCelda2 = fila.cells[1].textContent; // Contenido de la segunda celda en la fila
												var contenidoCelda3 = fila.cells[2].textContent; // Contenido de la primera celda en la fila
												var contenidoCelda4 = fila.cells[3].textContent; // Contenido de la segunda celda en la fila
												var contenidoCelda5 = fila.cells[4].textContent; // Contenido de la primera celda en la fila
												var contenidoCelda6 = fila.cells[12].textContent; // Contenido de la primera celda en la fila

												console.log("Contenido de la primera celda en la fila:", contenidoCelda1);
												console.log("Contenido de la segunda celda en la fila:", contenidoCelda2);
	
												// Obtener la casilla de verificación por su ID
												var radio1 = document.getElementById('rb_primero');
												var radio2 = document.getElementById('rb_segundo');
												var radio3 = document.getElementById('rb_tercero');
	
												// Verificar si está seleccionada
												if (radio1.checked) {
													document.getElementById('Medicamento_Codigo_1').value = contenidoCelda1;
													document.getElementById('Medicamento_Nombre_1').value = contenidoCelda2;
													document.getElementById('Medicamento_Descripcion_1').value = contenidoCelda3;
													document.getElementById('Medicamento_Cantidad_1').value = contenidoCelda4;
													document.getElementById('Medicamento_Presentacion_1').value = contenidoCelda5;
													document.getElementById('Medicamento_Id_1').value = contenidoCelda6;
													
												} else if (radio2.checked) {
													document.getElementById('Medicamento_Codigo_2').value = contenidoCelda1;
													document.getElementById('Medicamento_Nombre_2').value = contenidoCelda2;
													document.getElementById('Medicamento_Descripcion_2').value = contenidoCelda3;
													document.getElementById('Medicamento_Cantidad_2').value = contenidoCelda4;
													document.getElementById('Medicamento_Presentacion_2').value = contenidoCelda5;
													document.getElementById('Medicamento_Id_2').value = contenidoCelda6;

												} else{
													document.getElementById('Medicamento_Codigo_3').value = contenidoCelda1;
													document.getElementById('Medicamento_Nombre_3').value = contenidoCelda2;
													document.getElementById('Medicamento_Descripcion_3').value = contenidoCelda3;
													document.getElementById('Medicamento_Cantidad_3').value = contenidoCelda4;
													document.getElementById('Medicamento_Presentacion_3').value = contenidoCelda5;
													document.getElementById('Medicamento_Id_3').value = contenidoCelda6;

												}
											}
												// Borrar el contenido de input
												var input = document.getElementById("BuscaMed");
	
												// Establece el valor del input a una cadena vacía
												input.value = "";
										});
										}
									}
						</script>
	
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<label for="BuscaMed">Busqueda de medicamento:</label>	
	
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			
				<!--Grupo: Radio button -->
				<div class="formulario__grupo" id="grupo__vacio">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">				
							<a href="#" class="hero__cta_med">Buscar</a> 
							</div>
							<div class="formulario__grupo-input">				
							
							<p>
							Medicamento:<br><br>

							Primero: <input type="radio" name="medicamento" id="rb_primero" value="rb_primero" checked/><br />
							Segundo: <input type="radio" name="medicamento" id="rb_segundo" value="rb_segundo"/><br />
							Tercero: <input type="radio" name="medicamento" id="rb_tercero" value="rb_tercero"/>

							</p><br>
								
								
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
				
	<!--/fieldset-->


	<fieldset>
			<legend>Medicamento 1</legend>
			

			<!--Grupo: Check Box Padecimiento secundario -->
			

			
			<!--Grupo: Medicamento Código -->

				<!--div class="formulario__grupo" id="grupo__Medicamento_1"-->
				<div class="formulario__grupo" id="grupo__Medicamento_Id_1">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
											
								<input type="hidden" class="formulario__input" id="Medicamento_Id_1" name="Medicamento_Id_1"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="Medicamento_Codigo"></label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

			<!--div class="formulario__grupo" id="grupo__Medicamento_1"-->
				<div class="formulario__grupo" id="grupo__Medicamento_Codigo_1">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Clave:</p>				
								<input type="text" class="formulario__input" id="Medicamento_Codigo_1" name="Medicamento_Codigo_1"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="Medicamento_Codigo"></label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

				<!--Grupo: Medicamento Nombre 1-->
				<div class="formulario__grupo" id="grupo__Medicamento_Nombre_1">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Nombre:</p>	
								<input type="text" class="formulario__input" id="Medicamento_Nombre_1" name="Medicamento_Nombre_1" rows="5" readonly>			
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Nombre:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Descripcion_1">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Descripción:</p>	
								<textarea class="estilotextarea" id="Medicamento_Descripcion_1" name="Medicamento_Descripcion_1" rows="5" readonly></textarea>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Cantidad_1">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Cantidad:</p>	
								<input type="text"  class="formulario__input" id="Medicamento_Cantidad_1" name="Medicamento_Cantidad_1" rows="5" readonly>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Presentacion_1">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">	
								<p>Presentación:</p>
								<input type="text"  class="formulario__input" id="Medicamento_Presentacion_1" name="Medicamento_Presentacion_1" rows="5" readonly>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->
				
			</fieldset>

			<fieldset>
			<legend>Medicamento 2</legend>
			

			<!--Grupo: Check Box Padecimiento secundario -->
			

			
			<!--Grupo: Medicamento Código -->

				<!--div class="formulario__grupo" id="grupo__Medicamento_1"-->
				<div class="formulario__grupo" id="grupo__Medicamento_Id_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
											
								<input type="hidden" class="formulario__input" id="Medicamento_Id_2" name="Medicamento_Id_2"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="Medicamento_Codigo"></label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

			<!--div class="formulario__grupo" id="grupo__Medicamento_1"-->
				<div class="formulario__grupo" id="grupo__Medicamento_Codigo_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Clave:</p>				
								<input type="text" class="formulario__input" id="Medicamento_Codigo_2" name="Medicamento_Codigo_2"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="Medicamento_Codigo"></label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

				<!--Grupo: Medicamento Nombre 1-->
				<div class="formulario__grupo" id="grupo__Medicamento_Nombre_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Nombre:</p>	
								<input type="text" class="formulario__input" id="Medicamento_Nombre_2" name="Medicamento_Nombre_2" readonly>			
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Nombre:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Descripcion_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Descripción:</p>	
								<textarea class="estilotextarea" id="Medicamento_Descripcion_2" name="Medicamento_Descripcion_2" rows="5" readonly></textarea>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Cantidad_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Cantidad:</p>	
								<input type="text"  class="formulario__input" id="Medicamento_Cantidad_2" name="Medicamento_Cantidad_2" readonly>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Presentacion_2">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">	
								<p>Presentación:</p>
								<input type="text"  class="formulario__input" id="Medicamento_Presentacion_2" name="Medicamento_Presentacion_2" readonly>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->
				
			</fieldset>

			<fieldset>
			<legend>Medicamento 3</legend>
			

			<!--Grupo: Check Box Padecimiento secundario -->
			

			
			<!--Grupo: Medicamento Código -->


				<!--div class="formulario__grupo" id="grupo__Medicamento_1"-->
				<div class="formulario__grupo" id="grupo__Medicamento_Id_3">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
										
								<input type="hidden" class="formulario__input" id="Medicamento_Id_3" name="Medicamento_Id_3"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="Medicamento_Codigo"></label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

			<!--div class="formulario__grupo" id="grupo__Medicamento_1"-->
				<div class="formulario__grupo" id="grupo__Medicamento_Codigo_3">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Clave:</p>				
								<input type="text" class="formulario__input" id="Medicamento_Codigo_3" name="Medicamento_Codigo_3"  readonly required>
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="Medicamento_Codigo"></label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>

				<!--Grupo: Medicamento Nombre 1-->
				<div class="formulario__grupo" id="grupo__Medicamento_Nombre_3">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Nombre:</p>	
								<input type="text" class="formulario__input" id="Medicamento_Nombre_3" name="Medicamento_Nombre_3" readonly>			
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Nombre:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Descripcion_3">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Descripción:</p>	
								<textarea class="estilotextarea" id="Medicamento_Descripcion_3" name="Medicamento_Descripcion_3" rows="5" readonly></textarea>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Cantidad_3">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">
								<p>Cantidad:</p>	
								<input type="text"  class="formulario__input" id="Medicamento_Cantidad_3" name="Medicamento_Cantidad_3" readonly>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->

			<!--Grupo: Medicamento Descripción 1-->
			<div class="formulario__grupo" id="grupo__Medicamento_Presentacion_3">
					<div class="row">
						<div class="input-group">
							<div class="formulario__grupo-input">	
								<p>Presentación:</p>
								<input type="text"  class="formulario__input" id="Medicamento_Presentacion_3" name="Medicamento_Presentacion_3" readonly>			
								<!--input type="text" class="formulario__input" id="cie_10_desc" name="cie_10_desc" required-->
								<i class="formulario__validacion-estado fas fa-times-circle"></i>
								<!--label for="cie_10_desc">Descripción:</label-->
							</div>
							
						<p class="formulario__input-error">Solo puede contener hasta tres digitos..</p>	
						</div>
					</div>
				</div>
			<!--/div-->
				
			</fieldset>

									
			<div class="formulario__grupo formulario__grupo-btn-enviar">
				<div class="row">
					<br>
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
	<script src="js/main.js" ></script>	
	<script src="js/main_med.js" ></script>
	<!--script src="../js/scripts.js"></script-->



</body>

</html>