<?php

try{
    include('../../CNX/cnxon.php');

    $Query = "UPDATE `tbl_usuarios` SET `nombre`='$_REQUEST[nombre]',
    `apaterno`='$_REQUEST[Ap_Paterno]',`amaterno`='$_REQUEST[Ap_Materno]',`usuario`='$_REQUEST[User]',
    `password`='$_REQUEST[PWD]',`expediente`='$_REQUEST[DISUR_ID]',`email`='$_REQUEST[e_mail]',
    `sucursal`='$_REQUEST[Location]',`perfil`='Test' WHERE `id` = '$_REQUEST[Id]'";

    $pdoQuery_1 = $conn-> prepare($Query);
    $pdoQuery_1->execute();
    //$reg=$pdoQuery_1->fetch(PDO::FETCH_ASSOC);
}catch (Excepton $e){
    die('Error:'. $e->getMessage());
}

echo "<script languaje='JavaScript'> if(!alert('El registro fue actualizado.')) window.location = 'modificaregistro.php?ID=".$_REQUEST['Id']."';
</script>";


?>