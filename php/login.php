<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "id20687038_pablonaelcano";
$password = "1$#??3CbJUd{7F=d";
$dbname = "id20687038_seguridad";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Verifica las credenciales de inicio de sesión
$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT nombre_completo, usuario FROM USUARIOS WHERE usuario='$username' AND contrasena='$password'";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    // Inicio de sesión exitoso
    header("Location: ../html/encriptado.html");
    exit();
} else {
    // Credenciales incorrectas
    echo "<script>alert('No se encontró ningún usuario');</script>";
    echo "<script>window.location.href = '../html/login.html';</script>";
    exit();
}

$conn->close();
?>