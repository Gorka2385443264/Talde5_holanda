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
$historialCompras = [
    ['producto' => 'Bicicleta de montaña', 'fecha' => '2023-01-15', 'monto' => '120.00€'],
    ['producto' => 'Casco de bicicleta', 'fecha' => '2023-02-20', 'monto' => '35.00€']
];



// Asegúrate de manejar el caso de que el usuario no esté logueado
$nombre_usuario = $_SESSION['nombre_usuario'] ?? 'Invitado';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Perfil</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/miPerfil.css">
    <!-- Incluir aquí tu archivo CSS -->
</head>
<body>
<a href="mainPage.php" class="back-to-index">
        <button class="back-button">⬅</button>
    </a>
    <div class="Mainperfil">
        <h1>Hola, <?php echo htmlspecialchars($nombre_usuario); ?></h1>
        
        <section>
            <h2>Historial de Compras</h2>
            <table>
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historialCompras as $compra): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($compra['producto']); ?></td>
                        <td><?php echo htmlspecialchars($compra['fecha']); ?></td>
                        <td><?php echo htmlspecialchars($compra['monto']); ?></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </section>
    </div>
    <?php require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php");?>

</body>
</html>
