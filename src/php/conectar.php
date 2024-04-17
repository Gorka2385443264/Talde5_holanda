<?php
session_start();
$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "erronka3";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nombre']) && isset($_POST['apellido']) && isset($_POST['correo']) && isset($_POST['telefono']) && isset($_POST['contraseña'])) {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = $_POST['contraseña'];

    // Insertar datos en la tabla erronka3.bezeroa
    $sql_bezeroa = "INSERT INTO bezeroa (izena, abizena, korreoa, telefonoa, pasahitza) VALUES (?, ?, ?, ?, ?)";
    $stmt_bezeroa = $conn->prepare($sql_bezeroa);
    $stmt_bezeroa->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $contraseña);

    if ($stmt_bezeroa->execute()) {
        echo "<script>alert('Registro exitoso');</script>";
    } else {
        echo "<script>alert('Error al registrar: " . $stmt_bezeroa->error . "');</script>";
    }

    $stmt_bezeroa->close();
}

// Si se envió el formulario de inicio de sesión
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['correo_login']) && isset($_POST['contraseña_login'])) {
    // Recibir datos del formulario
    $correo_login = $_POST['correo_login'];
    $contraseña_login = $_POST['contraseña_login'];

    // Verificar las credenciales en la tabla erronka3.bazeroa
    $sql = "SELECT * FROM bezeroa WHERE korreoa=? AND pasahitza=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $correo_login, $contraseña_login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        // Credenciales correctas, iniciar sesión
        $_SESSION['loggedin'] = true;
        $_SESSION['correo'] = $correo_login;
        echo "<script>alert('Inicio de sesión exitoso');</script>";
    } else {
        // Credenciales incorrectas
        echo "<script>alert('Credenciales incorrectas');</script>";
    }
    $stmt->close();
}

$conn->close();
?>