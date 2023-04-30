<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "root";
$password = "valenzuela10";
$dbname = "seguridad";

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
$stmt = $conn->prepare("INSERT INTO usuarios (nombre_completo, correo, usuario, contrasena) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $nombre, $email, $usuario, $contrasena);

// Ejecuta la consulta preparada
if ($stmt->execute() === TRUE) {
    echo "Registro exitoso";
    header("Location: ../html/index.html");
    exit();
} else {
    echo "Error: " . $stmt->error;
    header("Location:../html/index.html");
    exit();
}

$stmt->close();
$conn->close();
?>