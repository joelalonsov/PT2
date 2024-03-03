<?php
include('../../CNX/cnxon.php');
$nombre='';
if ($_REQUEST['PWD'] <> $_REQUEST['PWD_2']){
	echo "La confirmación de contraseña no coincide";
}
else
{
 
$pwd_recibe = $_REQUEST['PWD'];
$regexp_pwd = '/^(?=.{8,}$)(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$/';
$pwd_valida = preg_match($regexp_pwd,$pwd_recibe);

if($pwd_valida == 0){
echo "La longitud mínima de la contraseña debe ser de 8 posiciones, debe contener letras y números y por lo menos un carácter especial (#,$,-,_,&,%)";
}
else
{
 
try{
    $Snombre = $_REQUEST['nombre'];
    $SApaterno = $_REQUEST['Ap_Paterno'];
    $SAmaterno = $_REQUEST['Ap_Materno'];


    $pdoQuery_1 = $conn-> prepare("SELECT * FROM `tbl_usuarios` WHERE `nombre` = ?");

    $pdoQuery_1->execute(array($Snombre));

    while($reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC)){
	
        $nombre=$reg['nombre'];
        //$aPaterno=$reg['apaterno'];
        //$aMaterno=$reg['amaterno'];
        //$PWD=$reg['password'];
        
    }
}catch (Excepton $e){
    die('Error:'. $e->getMessage());
}

if ($nombre==$Snombre)
    {
	echo "<script languaje='JavaScript'> if(!alert('El Id del usuario ya existe')); javascript:history.back();
</script>";



	}else{
		//mysqli_query($conn, $SQL2) or die(mysqli_error($conn));	 

/*echo "<script languaje='JavaScript'> if(!alert('Validación exitosa de usuario')) window.location = 'alta_usuarios.php';
</script>";*/

echo '<script language="javascript">alert("***Validación exitosa de usuario***"); return false;</script>';

try{
    $Inombre = $_REQUEST['nombre'];
    $IAp_Paterno = $_REQUEST['Ap_Paterno'];
    $IAP_Materno = $_REQUEST['Ap_Materno'];
    $IUser = $_REQUEST['User'];
    $IPWD = $_REQUEST['PWD'];

$pdoQuery_2 = $conn-> prepare( "INSERT INTO `tbl_usuarios`(`nombre`, `apaterno`, `amaterno`, `usuario`, `password`, `perfil`) VALUES 
(:Inombre, :IAp_Paterno, :IAP_Materno, :IUser, :IPWD, :IPWD)");

$pdoExec = $pdoQuery_2->execute(array(":Inombre"=>$Inombre, ":IAp_Paterno"=>$IAp_Paterno, ":IAP_Materno"=>$IAP_Materno, ":IUser"=>$IUser, ":IPWD"=>$IPWD, ":IPWD"=>$IPWD));

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

	}
        

    
$conn = null;
}
}

?>