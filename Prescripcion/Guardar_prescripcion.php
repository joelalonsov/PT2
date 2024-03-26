<?php
session_start();
include('../CNX/cnxon.php');


date_default_timezone_set(timezoneId:"America/Mexico_City");

try{
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
    $ICaptura = $_SESSION['Usuario'];
    $IAhora =  date(format: 'Y-m-d H:i:s');

$pdoQuery_2 = $conn-> prepare( "INSERT INTO `tbl_prescripcion`(`folio`, `pac_nombre`, `pac_A_paterno`, `pac_A_materno`, `fecha_nac`, `temperatura`, `presion`, `peso`, `estatura`, 
`frecuencia_resp`, `ritmo_card`, `padecimiento_1`, `padecimiento_2`, `medicamento_1`, `medicamento_2`, `medicamento_3`, `creado_por`, `fecha_creacion`) VALUES 
(:IFolio, :INombre, :IA_Paterno, :IA_Materno, :IFecha_nac, :ITemperatura, :IPresion_art, :IPeso, :IEstatura, :IFResp, :IRCard, :IPadecimiento_1, :IPadecimiento_2, :IMedicamento_1, 
:IMedicamento_2, :IMedicamento_3, :ICaptura, :IAhora )");

$pdoExec = $pdoQuery_2->execute(array(":IFolio" =>$IFolio, ":INombre" =>$INombre, ":IA_Paterno"=>$IA_Paterno, ":IA_Materno"=>$IA_Paterno, "IFecha_nac" => $IFecha_nac, ":ITemperatura"=>$ITemperatura, 
":IPresion_art"=>$IPresion_art, ":IPeso"=>$IPeso, ":IEstatura"=>$IEstatura, ":IFResp"=>$IFResp, ":IRCard"=>$IRCard, ":IPadecimiento_1"=>$IPadecimiento_1, 
":IPadecimiento_2"=>$IPadecimiento_2, ":IMedicamento_1"=>$IMedicamento_1, ":IMedicamento_2"=>$IMedicamento_2, ":IMedicamento_3"=>$IMedicamento_3, ":ICaptura"=>$ICaptura, ":IAhora" => $IAhora ));

    if($pdoExec)
    {
        echo 'Datos insertados';
        echo "<script languaje='JavaScript'> window.location = 'consulta_pacientes.php';
</script>";
    }else{
        echo 'Datos No insertados';
    }

} catch (Excepton $e){
    die('Error:'. $e->getMessage());
}

        
$conn = null;

?>