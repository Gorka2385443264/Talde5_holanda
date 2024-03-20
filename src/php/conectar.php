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

// Si se envió el formulario de registro
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['nombre']) && isset ($_POST['apellido']) && isset ($_POST['correo']) && isset ($_POST['telefono']) && isset ($_POST['contraseña'])) {
    // Recibir datos del formulario
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $correo = $_POST['correo'];
    $telefono = $_POST['telefono'];
    $contraseña = password_hash($_POST['contraseña'], PASSWORD_DEFAULT); // Cifrar la contraseña

    // Insertar datos en la tabla erronka3.bezeroa
    $sql = "INSERT INTO bezeroa (izena, abizena, korreoa, telefonoa, pasahitza) VALUES (?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $contraseña);

    if ($stmt->execute()) {
        echo "<script>alert('Registro exitoso');</script>";
    } else {
        echo "<script>alert('Error al registrar: " . $conn->error . "');</script>";
    }
    $stmt->close();
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
    $conn->close();
}
?>