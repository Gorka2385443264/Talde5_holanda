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
    $contraseña = $_POST['contraseña'];

    // Insertar datos en la tabla erronka3.bezeroa
    $sql_bezeroa = "INSERT INTO bezeroa (izena, abizena, korreoa, telefonoa, pasahitza) VALUES (?, ?, ?, ?, ?)";
    $stmt_bezeroa = $conn->prepare($sql_bezeroa);
    $stmt_bezeroa->bind_param("sssss", $nombre, $apellido, $correo, $telefono, $contraseña);

    if ($stmt_bezeroa->execute()) {
        echo "<script>alert('Registro exitoso');</script>";

        // Insertar datos en la tabla erronka3.iniciarsesion
        $sql_iniciarsesion = "INSERT INTO iniciarsesion (korreoa, pasahitza) VALUES (?, ?)";
        $stmt_iniciarsesion = $conn->prepare($sql_iniciarsesion);
        $stmt_iniciarsesion->bind_param("ss", $correo, $contraseña);

        if ($stmt_iniciarsesion->execute()) {
            echo "<script>alert('Registro de inicio de sesión exitoso');</script>";
        } else {
            echo "<script>alert('Error al registrar el inicio de sesión: " . $conn->error . "');</script>";
        }
        $stmt_iniciarsesion->close();
    } else {
        echo "<script>alert('Error al registrar: " . $conn->error . "');</script>";
    }
    $stmt_bezeroa->close();
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
        // Obtener el nombre de usuario asociado al correo electrónico
        $sql_nombre_usuario = "SELECT izena FROM bezeroa WHERE korreoa='$correo_login'";
        $result_nombre_usuario = $conn->query($sql_nombre_usuario);
        
        if ($result_nombre_usuario->num_rows > 0) {
            $row_nombre_usuario = $result_nombre_usuario->fetch_assoc();
            $nombreUsuario = $row_nombre_usuario['izena'];
            
            echo "Inicio de sesión exitoso como: " . $nombreUsuario;
        } else {
            echo "No se pudo obtener el nombre de usuario";
        }
    } else {
        echo "Credenciales incorrectas";
    }
    $conn->close();
}
?>