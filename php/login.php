<?php
// Conecta con la base de datos
$mysqli = new mysqli("localhost", "root", "valenzuela10", "seguridad");

// Verifica si hay algún error en la conexión
if ($mysqli->connect_error) {
    die("Error al conectar con la base de datos: " . $mysqli->connect_error);
}

// Verifica las credenciales de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT nombre_completo, usuario FROM usuarios WHERE usuario='$username' AND contrasena='$password'";
$result = $mysqli->query($sql);

if ($result->num_rows > 0) {
    // Inicio de sesión exitoso
    header("Location: ../html/encriptado.html");
    exit();
} else {
    // Credenciales incorrectas
    echo "<script>alert('No se encontró ningún usuario');</script>";
    echo "<script>window.location.href = '../html/login.html';</script>";
    exit();
}

$mysqli->close();
?>