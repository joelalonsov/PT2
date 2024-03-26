<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html>
    <head></head>
<body>

<table style="width:95%" id="tabla_Medicamento" class "modal__tabla">
				<tr>
                    <th style="width:10px">Clave</th><th style="width:600px">Nombre</th><th style="width:600px">Descripción</th><th style="width:600px">Cantidad</th><th style="width:600px">Presentación</th>
                    <th style="width:600px">Grupo</th><th style="width:600px">Indicaciones</th><th style="width:600px">Via y dósis</th><th style="width:600px">Generalidades</th><th style="width:600px">Efectos Adversos</th>
                    <th style="width:600px">Contraindicaciones</th><th style="width:600px">Interacciones</th>
				</tr>


<?php
//header('Content-Type: text/html; charset=UTF-8'); 
 $_GET['medicamento'];

 $renglon=0;
 $columna=0;

try{
    include('../CNX/cnxon.php');
    $pdoQuery_1 = $conn-> prepare("SELECT `str_clave`, `str_nombre_Generico`,`str_Descripcion`, `str_cantidad`,`str_presentacion`,
    `str_Grupo`,`str_indicaciones`,`str_ViaAdmonyDosis`,`str_generalidades`,`str_efectos_adversos`,`str_contraindicaciones`,`str_interacciones`, `int_IdMedicamento`
     FROM `tbl_medicamentos` WHERE `str_nombre_Generico` LIKE '%".$_GET['medicamento']."%' ORDER BY `int_IdMedicamento` ASC");
    $pdoQuery_1->execute();

    while($reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC)){
        echo '<tr>';

        echo '<td id="r'.$renglon.'1">'; 
        echo $reg['str_clave'];
        echo '</td>';
        echo '<td id="r'.$renglon.'2">'; 
        echo $reg['str_nombre_Generico'];
        echo '</td>';

        echo '<td id="r'.$renglon.'3">'; 
        echo $reg['str_Descripcion'];
        echo '</td>';
        echo '<td id="r'.$renglon.'4">'; 
        echo $reg['str_cantidad'];
        echo '</td>';

        echo '<td id="r'.$renglon.'5">'; 
        echo $reg['str_presentacion'];
        echo '</td>';
        echo '<td id="r'.$renglon.'6">'; 
        echo $reg['str_Grupo'];
        echo '</td>';

        echo '<td id="r'.$renglon.'7">'; 
        echo $reg['str_indicaciones'];
        echo '</td>';
        echo '<td id="r'.$renglon.'8">'; 
        echo $reg['str_ViaAdmonyDosis'];
        echo '</td>';

        echo '<td id="r'.$renglon.'9">'; 
        echo $reg['str_generalidades'];
        echo '</td>';
        echo '<td id="r'.$renglon.'10">'; 
        echo $reg['str_efectos_adversos'];
        echo '</td>';

        echo '<td id="r'.$renglon.'11">'; 
        echo $reg['str_contraindicaciones'];
        echo '</td>';
        echo '<td id="r'.$renglon.'12">'; 
        echo $reg['str_interacciones'];
        echo '</td>';

        echo '<td id="r'.$renglon.'13">'; 
        echo $reg['int_IdMedicamento'];
        echo '</td>';
                 
        echo '</tr>';
    $renglon+=1;
    }
    
}catch(Excepton $e){
die('Error:'. $e->getMessage());
}



?>
</body>
</html>