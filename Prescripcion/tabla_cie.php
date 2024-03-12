<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>

<head></head>

<body>

<table style="width:95%" border="1">
				<tr>
				<th style="width:10px">Consecutivo</th><th>Nombre</th><th>Seleccionar</th>
				</tr>


<?php
//header('Content-Type: text/html; charset=UTF-8'); 
 $_GET['cie__10'];


try{
    include('../CNX/cnxon.php');
    $pdoQuery_1 = $conn-> prepare("SELECT consecutivo, nombre FROM `cat_cie_10` WHERE `nombre` LIKE '%".$_GET['cie__10']."%' ORDER BY `consecutivo` ASC");
    $pdoQuery_1->execute();

    while($reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';
        echo '<td>';
        echo $reg['consecutivo'];
        echo '</td>';
        echo '<td>';
        echo $reg['nombre'];
        echo '</td>';
        echo '<td>';
        echo '<a href="#"><img src="../Imagenes/view.png" height="20" border="0"></a>';
        echo '</td>';           
        echo '</tr>';

    }
    
}catch(Excepton $e){
die('Error:'. $e->getMessage());
}

?>
</body>
</html>