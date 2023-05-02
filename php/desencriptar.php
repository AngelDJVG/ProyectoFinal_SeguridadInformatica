<?php
  $texto_encriptado_hex = $_POST["texto_encriptado"];
  $clave = $_POST["clave"];

  $texto_encriptado_hex = $texto_encriptado_hex;

  
  $texto_encriptado = hex2bin($texto_encriptado_hex);

  // Desencriptamos el texto
  $texto = openssl_decrypt($texto_encriptado, 'aes-256-cbc', $clave, OPENSSL_RAW_DATA);

  // Retornamos el texto desencriptado
  echo $texto;
?>