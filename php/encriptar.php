<?php
error_reporting(E_ALL & ~E_WARNING);

$texto = $_POST["texto"];
$clave = $_POST["clave"];

// Encriptamos el texto sin vector de inicialización
$texto_encriptado = openssl_encrypt($texto, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA);

// Convertimos el texto encriptado a formato hexadecimal
$texto_encriptado_hex = bin2hex($texto_encriptado);

// Retornamos los datos encriptados como un string en formato hexadecimal
echo $texto_encriptado_hex;
?>