<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "id20713721_pablonaelcano";
$password = "fNsIUjhp8j}/C4=>";
$dbname = "id20713721_seguridad";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtiene los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['password'];

// Prepara la consulta preparada
$sql="INSERT INTO USUARIOS (nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo("Error al preparar la consulta SQL: " . mysqli_error($conn));
    header("Location:../index.html");
    exit();
}

$stmt->bind_param("ssss", $nombre, $email, $usuario, $contrasena);

if (!$stmt->execute()) {
    echo "<script>alert('No se pudo registrar el usuario, una de las credenciales está repetida.');</script>";
    echo "<script>window.location.href = '../html/signup.html';</script>";
    exit();
}

header("Location: ../index.html");
exit();
$stmt->close();
$conn->close();
?>