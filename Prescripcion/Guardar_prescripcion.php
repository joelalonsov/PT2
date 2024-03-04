<?php
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
    $IRCard = $_REQUEST['Ritmo_Cardiaco'];
    $ICaptura = "joel.alonso";
    $IAhora =  date(format: 'Y-m-d H:i:s');

$pdoQuery_2 = $conn-> prepare( "INSERT INTO `tbl_prescripcion`(`folio`, `pac_nombre`, `pac_A_paterno`, `pac_A_materno`, `fecha_nac`, `temperatura`, `presion`, `peso`, `estatura`, 
`frecuencia_resp`, `ritmo_card`, `creado_por`, `fecha_creacion`) VALUES 
(:IFolio, :INombre, :IA_Paterno, :IA_Materno, :IFecha_nac, :ITemperatura, :IPresion_art, :IPeso, :IEstatura, :IFResp, :IRCard, :ICaptura, :IAhora )");

$pdoExec = $pdoQuery_2->execute(array(":IFolio" =>$IFolio, ":INombre" =>$INombre, ":IA_Paterno"=>$IA_Paterno, ":IA_Materno"=>$IA_Paterno, "IFecha_nac" => $IFecha_nac, ":ITemperatura"=>$ITemperatura, 
":IPresion_art"=>$IPresion_art, ":IPeso"=>$IPeso, ":IEstatura"=>$IEstatura, ":IFResp"=>$IFResp, ":IRCard"=>$IRCard, ":ICaptura"=>$ICaptura, ":IAhora" => $IAhora ));

    if($pdoExec)
    {
        echo 'Datos insertados';
        echo "<script languaje='JavaScript'> window.location = 'consulta_usuarios.php';
</script>";
    }else{
        echo 'Datos No insertados';
    }

} catch (Excepton $e){
    die('Error:'. $e->getMessage());
}

        
$conn = null;

?>