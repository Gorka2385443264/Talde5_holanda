<?php
$servername = "localhost";
$username = "root";
$password = "1WMG2023";
$dbname = "erronka3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die ("Conexión fallida: " . $conn->connect_error);
}

// Si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['correo_login']) && isset ($_POST['contraseña_login'])) {
    // Recibir datos del formulario
    $correo_login = $_POST['correo_login'];
    $contraseña_login = $_POST['contraseña_login'];

    // Verificar las credenciales en la tabla erronka3.iniciarsesion
    $sql = "SELECT * FROM iniciarsesion WHERE korreoa='$correo_login' AND pasahitza='$contraseña_login'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario autenticado
        echo "Inicio de sesión exitoso";
    } else {
        echo "Credenciales incorrectas";
    }
}

$conn->close();
?>