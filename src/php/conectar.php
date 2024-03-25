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




if ($_SERVER["REQUEST_METHOD"] == "POST" && isset ($_POST['correo_login']) && isset ($_POST['contraseña_login'])) {
    // Recibir datos del formulario

    // Verificar las credenciales en la tabla erronka3.iniciarsesion
    $correo_login = $_POST['correo_login'];
    $contraseña_login = $_POST['contraseña_login'];

    $sql = "SELECT * FROM iniciarsesion WHERE korreoa=? AND pasahitza=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $correo_login, $contraseña_login);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario autenticado
        $sql_nombre = "SELECT izena FROM bezeroa WHERE korreoa=?";
        $stmt_nombre = $conn->prepare($sql_nombre);
        $stmt_nombre->bind_param("s", $correo_login);
        $stmt_nombre->execute();
        $result_nombre = $stmt_nombre->get_result();
        if ($result_nombre->num_rows > 0) {
            $row = $result_nombre->fetch_assoc();
            $nombre_usuario = $row['izena'];
            echo $nombre_usuario; // Esto devolverá el nombre del usuario
        } else {
            echo "Nombre no encontrado";
        }
        $stmt_nombre->close();
    } else {
        echo "Credenciales incorrectas";
    }

    if ($result->num_rows > 0) {
        // Usuario autenticado
        $sql_apellido = "SELECT abizena FROM bezeroa WHERE korreoa=?";
        $stmt_apellido = $conn->prepare($sql_apellido);
        $stmt_apellido->bind_param("s", $correo_login);
        $stmt_apellido->execute();
        $result_apellido = $stmt_apellido->get_result();
        if ($result_apellido->num_rows > 0) {
            $row_apellido = $result_apellido->fetch_assoc();
            $apellido_usuario = $row_apellido['abizena'];
            echo $apellido_usuario; // Esto devolverá el apellido del usuario
        } else {
            echo "Apellido no encontrado";
        }
        $stmt_apellido->close();
    } else {
        echo "Credenciales incorrectas";
    }

    if ($result->num_rows > 0) {
        // Usuario autenticado
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['apellido_usuario'] = $apellido_usuario; // Guardar nombre y apellido en la sesión
        echo $nombre_usuario; // Esto devolverá el nombre del usuario
    } else {
        echo "Credenciales incorrectas";
    }




    $stmt->close();
    $conn->close();
}
?>