<?php
session_start();



unset($_SESSION['login_ok']);  
unset($_SESSION['Usuario']);


echo "<script languaje='JavaScript'>  window.location = '../Logon_1.php';
</script>";
?>