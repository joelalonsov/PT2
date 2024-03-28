<?php
session_start();
include('../CNX/cnxon.php');


date_default_timezone_set(timezoneId:"America/Mexico_City");

try{
    $Id = $_REQUEST['Id_prescripcion'];
    $IFolio = $_REQUEST['Folio'];
    $INombre = $_REQUEST['Nombre'];
    $IA_Paterno = $_REQUEST['A_Paterno'];
    $IA_Materno = $_REQUEST['A_Materno'];
    $IFecha_nac = $_REQUEST['Fecha_nac'];
    $ITemperatura = $_REQUEST['Temperatura'];
    $IPresion_art = $_REQUEST['P_Arterial'];
    $IPeso = $_REQUEST['Peso'];
    $IEstatura = $_REQUEST['Estatura'];
    $IFResp = $_REQUEST['Frec_resp'];
    $IPadecimiento_1 = $_REQUEST['cie_10_id'];
    $IPadecimiento_2 = $_REQUEST['cie_10_id_2'];
    $IMedicamento_1 = $_REQUEST['Medicamento_Id_1'];
    $IMedicamento_2 = $_REQUEST['Medicamento_Id_2'];
    $IMedicamento_3 = $_REQUEST['Medicamento_Id_3'];
    $IRCard = $_REQUEST['Ritmo_Cardiaco'];
    $IModifica = $_SESSION['Usuario'];
    $IAhora =  date(format: 'Y-m-d H:i:s');

$pdoQuery_2 = $conn-> prepare( "UPDATE `tbl_prescripcion` SET `folio` = :IFolio, `pac_nombre` = :INombre, `pac_A_paterno` = :IA_Paterno, `pac_A_materno` = :IA_Materno, `fecha_nac` = :IFecha_nac,
 `temperatura` = :ITemperatura, `presion` = :IPresion_art, `peso` = :IPeso, `estatura` = :IEstatura, `frecuencia_resp` = :IFResp, `ritmo_card` = :IRCard, `padecimiento_1` = :IPadecimiento_1, 
 `padecimiento_2` = :IPadecimiento_2,  `medicamento_1` = :IMedicamento_1, `medicamento_2` = :IMedicamento_2, `medicamento_3` = :IMedicamento_3, `ultima_modificacion` = :IModifica, 
 `fecha_modificacion` = :IAhora WHERE `id_receta` = :Id");


$pdoExec = $pdoQuery_2->execute(array(":IFolio" =>$IFolio, ":INombre" =>$INombre, ":IA_Paterno"=>$IA_Paterno, ":IA_Materno"=>$IA_Materno, "IFecha_nac" => $IFecha_nac, 
":ITemperatura"=>$ITemperatura, 
":IPresion_art"=>$IPresion_art, ":IPeso"=>$IPeso, ":IEstatura"=>$IEstatura, ":IFResp"=>$IFResp, ":IRCard"=>$IRCard, ":IPadecimiento_1"=>$IPadecimiento_1, 
":IPadecimiento_2"=>$IPadecimiento_2, ":IMedicamento_1"=>$IMedicamento_1, ":IMedicamento_2"=>$IMedicamento_2, ":IMedicamento_3"=>$IMedicamento_3, ":IModifica"=>$IModifica, ":IAhora" => $IAhora, 
":Id" => $Id));

    if($pdoExec)
    {
        echo 'Datos actualizados';
        echo "<script languaje='JavaScript'> window.location = 'consulta_pacientes.php';
</script>";
    }else{
        echo 'Datos No actualizados';
    }

} catch (Excepton $e){
    die('Error:'. $e->getMessage());
}

        
$conn = null;

?>