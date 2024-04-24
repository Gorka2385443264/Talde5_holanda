<?php
// Asegúrate de iniciar la sesión en la parte superior de tu archivo
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Imaginemos que ya tienes un método para obtener el historial de compras y las rutas del usuario
// Por ejemplo:
// $historialCompras = obtenerHistorialCompras($idUsuario);
// $historialRutas = obtenerHistorialRutas($idUsuario);

// Datos de prueba
//$historialCompras = [
//    ['producto' => 'Bicicleta de montaña', 'fecha' => '2023-01-15', 'monto' => '120.00€'],
//    ['producto' => 'Casco de bicicleta', 'fecha' => '2023-02-20', 'monto' => '35.00€']
//];






$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "erronka3";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}


// Consulta SQL para obtener datos combinados
$sql = "SELECT a.id_alokairua, a.prezioa, a.data, b.mota
        FROM alokairua a
        JOIN bezeroa c ON a.id_bezeroa = c.id_bezeroa
        JOIN bizikleta b ON a.id_bizikleta = b.id_bizikleta";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Salida de cada fila de datos
    while($row = $result->fetch_assoc()) {
        echo "id_alokairua: " . $row["id_alokairua"]. " - Precio: " . $row["prezioa"]. " - Fecha: " . $row["data"]. " - Tipo de Bicicleta: " . $row["mota"]. "<br>";
    }
} else {
    echo "0 results";
}

$apellido_usuario = $_SESSION['apellido_usuario'];
$idUsuario=$_SESSION['id'];
$correo=$_SESSION['correo'];

// Cerrar conexión
$conn->close();
?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title><? trans("Mi perfil") ?></title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/miPerfil.css">
</head>
<body>
<a href="mainPage.php" class="back-to-index">
    <button class="back-button">⬅</button>
</a>
<div class="Mainperfil">
    <h1><? trans("hola") ?> <?php echo htmlspecialchars($nombre_usuario); ?></h1>
    
    <section>
        <h2><? trans("histDeCompra") ?></h2>
        <table>
            <thead>
                <tr>
                    <th><? trans("id laokairua") ?></th>
                    <th><? trans("Fecha") ?></th>
                    <th><? trans("Precio") ?></th>
                    <th><? trans("tipoBici") ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($apellido_usuario); ?></td>
                    <td><?php echo htmlspecialchars($idUsuario); ?></td>
                    <td><?php echo htmlspecialchars($correo); ?></td>
                    <td><?php echo htmlspecialchars($apellido_usuario); ?></td>
                </tr>
            </tbody>
        </table>
    </section>
</div>
<?php require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");?>

</body>
</html>

