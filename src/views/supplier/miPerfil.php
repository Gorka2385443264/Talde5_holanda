<?php
// Asegúrate de iniciar la sesión en la parte superior de tu archivo

// Imaginemos que ya tienes un método para obtener el historial de compras y las rutas del usuario
// Por ejemplo:
// $historialCompras = obtenerHistorialCompras($idUsuario);
// $historialRutas = obtenerHistorialRutas($idUsuario);

require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php");

$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "erronka3";
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

$idUsuario=$_SESSION['id'];

// Consulta SQL para obtener datos combinados
$sql = "SELECT a.id_alokairua, a.prezioa, a.data, b.mota
        FROM alokairua a
        JOIN bezeroa c ON a.id_bezeroa = c.id_bezeroa
        JOIN bizikleta b ON a.id_bizikleta = b.id_bizikleta
        WHERE a.id_bezeroa = $idUsuario";

$result = $conn->query($sql);
    
if ($result->num_rows > 0) {
    // Iniciar la tabla HTML
    echo '<h3>Tu historial de compras:</h3>';
    echo '<table border="1">';  // Añade 'border="1"' para ver los bordes de la tabla (útil para desarrollo)
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID de Compra</th>';
    echo '<th>Precio</th>';
    echo '<th>Fecha</th>';
    echo '<th>Tipo de Bicicleta</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';
    // Salida de cada fila de datos
    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row["id_alokairua"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["prezioa"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["data"]) . '</td>';
        echo '<td>' . htmlspecialchars($row["mota"]) . '</td>';
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
} else {
    echo '<p>No se encontraron resultados.</p>';
}


$apellido_usuario = $_SESSION['apellido_usuario'];
$idUsuario=$_SESSION['id'];
$correo=$_SESSION['correo'];
$nombre_usuario=$_SESSION['nombre_usuario'];

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

<div class="Mainperfil">
    <h1><? trans("hola") ?> <?php echo htmlspecialchars($nombre_usuario); ?></h1>
    
    <section>
        <table>
            <thead>
                <tr>
                    <th><?= trans("Izena") ?></th>
                    <th><?= trans("Abizena") ?></th>
                    <th><?= trans("Emaila") ?></th>
                    <th><?= trans("Zure id-a") ?></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo htmlspecialchars($nombre_usuario); ?></td>
                    <td><?php echo htmlspecialchars($apellido_usuario); ?></td>
                    <td><?php echo htmlspecialchars($correo); ?></td>
                    <td><?php echo htmlspecialchars($idUsuario); ?></td>
                </tr>
            </tbody>
        </table>
    </section>
</div>
<?php require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");?>

</body>
</html>

