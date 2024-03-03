<?php

$dsn = 'mysql:dbname=medisitm_disur;host=localhost';
$usuario = 'root';
$contraseña = '';

try {
    $conn = new PDO($dsn, $usuario, $contraseña);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn->exec("SET CHARACTER SET utf8");
    
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

?>