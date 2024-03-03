<?php
//Suponiendo que el archivo funciones.php está en la misma carpeta:
session_start();
if(!isset($_SESSION['Usuario'])){
header('Location: Logon_1.php');
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Menu DiSur</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<link rel="stylesheet" href="./CSS/menu.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Dancing+Script&family=Roboto+Mono&family=Syne&display=swap" rel="stylesheet">

</head>
<body>

    <div class="cover">
        <header>
            <img src="./Imagenes/logo.png" alt="disur-logo" class="disur-logo">
        </header>
            <p>
                <h1>
                    SISTEMA WEB PARA GESTIÓN DE ABASTO Y LOGÍSTICA
                </h1>
            </p>
    </div>
    
    <div class="grid-container">
        <div><i class="fa fa-gear"></i> <a href="Configuracion/configuracion.php"> Configuración </a></div>
        <div><i class="fa fa-thin fa-notes-medical"></i> <a href="Prescripcion/prescripcion.php"> Prescripción </a></div>
        <div><i class="fa fa-thin fa-truck-fast"></i> </i> <a href="#.php"> Dispensación </a></div>
        <div><i class="fa fa-clipboard-list"></i> </i> <a href="#.php"> Control de Inventario </a></div>
        <div><i class="fa fa-chart-line"></i> </i> <a href="#.php"> Reportes y Estadisticas </a></div>
        <div><i class="fa fa-suitcase-medical"></i> </i> <a href="#.php"> Recursos Materiales </a></div>
        <div><i class="fa fa-file-invoice-dollar"></i> </i> <a href="#.php"> Seguimiento y Facturación </a></div>
        <div><i class="fa fa-book-medical"></i> </i> <a href="#.php"> Regulación Sanitaria </a></div>
        <div><i class="fa fa-user-doctor"></i> </i> <a href="#.php"> Recursos Humanos </a></div>
        <div><i class="fa-sharp fa fa-circle-xmark"></i><a href="./funciones/destruir.php"> Cerrar Sesión </a></div>
    </div>

    <script src="https://unpkg.com/boxicons@2.1.4/dist/boxicons.js"></script>

</body>
</html>
