<?php
// Conecta a la base de datos
$servername = "localhost";
$username = "id20713721_pablonaelcano";
$password = "fNsIUjhp8j}/C4=>";
$dbname = "id20713721_seguridad";

// Crea la conexión
$conn = new mysqli($servername, $username, $password, $dbname);
// Verifica si hay algún error en la conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Verifica las credenciales de inicio de sesión y el hCaptcha
$username = $_POST['username'];
$password = $_POST['password'];
$token = $_POST['h-captcha-response'];

// Verifica el hCaptcha
$url = 'https://hcaptcha.com/siteverify';
$data = array('secret' => '0x76A339a589f408e6C0cB986699A387b01e04dDcC', 'response' => $token);
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
$response = json_decode($result);
if (!$response->success) {
    echo "<script>alert('Por favor, complete el captcha');</script>";
    echo "<script>window.location.href = '../html/login.html';</script>";
    exit();
}

$stmt = $conn->prepare("SELECT nombre_completo, usuario FROM USUARIOS WHERE usuario=? AND contrasena=?");
$stmt->bind_param("ss", $username, $password);
$stmt->execute();

$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $usuario = $row['usuario'];

    // Redirigir al archivo HTML de encriptado con los datos del usuario
    header("Location: ../html/encriptado.html?usuario=$usuario");
    exit();
} else {
    // Credenciales incorrectas
    echo "<script>alert('No se encontró ningún usuario');</script>";
    echo "<script>window.location.href = '../html/login.html';</script>";
    exit();
}

$conn->close();
?>