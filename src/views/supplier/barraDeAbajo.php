<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$nombre_usuario = isset($_SESSION['nombre_usuario']) ? $_SESSION['nombre_usuario'] : 'Invitado';
$apellido_usuario = isset($_SESSION['apellido_usuario']) ? $_SESSION['apellido_usuario'] : '';

// Aquí agregamos el código para obtener y asignar el nombre y apellido del usuario si ha iniciado sesión
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Si el usuario ha iniciado sesión, obtenemos el nombre y apellido de la base de datos
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

    $correo_usuario = $_SESSION['correo']; // Obtenemos el correo electrónico del usuario de la sesión

    // Consulta para obtener el nombre y apellido del usuario
    $sql = "SELECT izena, abizena FROM bezeroa WHERE korreoa=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $correo_usuario);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $nombre_usuario = $row['izena'];
        $apellido_usuario = $row['abizena'];
    } else {
        echo "No se encontraron resultados para el usuario con correo: " . $correo_usuario;
    }

    $stmt->close();
    $conn->close();
}
?>
<div class="Mainperfil">
    <div class="nombreEtc">
        <div class="iconoDelNombre">
            <i class="fa-regular fa-circle-user"></i>
        </div>
        <div class="resto" style="margin-right: auto;">
            <h1>Hola!</h1>
            <h3>
                <?php echo $nombre_usuario . " " . $apellido_usuario; ?>
            </h3>
            <div style="margin-right: auto;">Iniciar viaje</div>
        </div>
    </div>
    <div class="baraAbajo">
        <a href="mainPage.php" class="icon1"><i class="fa-solid fa-house"></i></a>
        <a href="catalogo.php" class="icon2"><i class="fa-solid fa-bicycle"></i></a>
        <a href="miPerfil.php" class="icon3"><i class="fa-regular fa-user"></i></a>
        <a href="ajustes.php" class="icon4"><i class="fa-solid fa-gear"></i></a>
    </div>
</div>