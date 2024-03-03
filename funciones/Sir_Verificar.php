<?php

session_start();
include('../CNX/cnxon.php');

$PWD="";

$codigoVerificacion = isset($_SESSION['codigo_verificacion']) ? $_SESSION['codigo_verificacion'] : '';

If(isset($_REQUEST['User'])&& !empty($_REQUEST['User']) &&
	isset($_REQUEST['PWD'])&& !empty($_REQUEST['PWD']) &&
	isset($_REQUEST['codigo'])&& !empty($_REQUEST['codigo']))
{

try{
			$sql =$conn->prepare("SELECT id, nombre, apaterno, amaterno, usuario, password
			FROM tbl_usuarios WHERE usuario =?");	
			
			$idusuario = $_REQUEST['User'];
			$codigo= isset($_REQUEST['codigo']) ? $_REQUEST['codigo'] : '';


			
			$sql->execute(array($idusuario));
		
			while($reg=$sql->fetch(PDO::FETCH_ASSOC)){
	
		
				$nombre=$reg['nombre'];
				$aPaterno=$reg['apaterno'];
				$aMaterno=$reg['amaterno'];
				$PWD=$reg['password'];
				
			}
	
	
}catch (Exception $e){
	die('Error:'. $e->getMessage());
}

$captcha = sha1($codigo);

	If($_REQUEST['PWD']==$PWD && $codigoVerificacion == $captcha)
	{
		$_SESSION['Usuario']= $_REQUEST['User'];
		
		echo "<script languaje='JavaScript'> 
				window.location = '../Index.php';
</script>";
			

}else{
	echo "<script languaje='JavaScript'> if(!alert('Usuario, contraseña o código inválidos. Favor de revisar la información ingresada.')) window.location = '../Logon_1.php';
</script>";
	
	}
	$conn = null;
}else{
	echo "<script languaje='JavaScript'> if(!alert('Favor de ingresar la información solicitada.')) window.location = '../Logon_1.php';
</script>";
}

?>