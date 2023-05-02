<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "id20687038_pablonaelcano";
$password = "1$#??3CbJUd{7F=d";
$dbname = "id20687038_seguridad";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica la conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Verifica que los campos no estén vacíos
if(empty($_POST['nombre']) || empty($_POST['email']) || empty($_POST['usuario']) || empty($_POST['contrasena'])) {
    echo "<script>alert('Por favor, complete todos los campos');</script>";
    header("Location:../html/index.html");
    exit();
}

// Obtiene los datos del formulario
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Prepara la consulta preparada
$sql="INSERT INTO USUARIOS (nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    echo("Error al preparar la consulta SQL: " . mysqli_error($conn));
    header("Location: ../index.html");
    exit();
}

$stmt->bind_param("ssss", $nombre, $email, $usuario, $contrasena);

if (!$stmt->execute()) {
    echo("Error al ejecutar la consulta SQL: " . mysqli_error($conn));
    header("Location: ../index.html");
    exit();
}

header("Location: ../index.html");
exit();
$stmt->close();
$conn->close();
?>