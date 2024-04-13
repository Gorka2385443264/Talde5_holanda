<?php
// Simula obtener el ID del producto desde la URL
$productoId = isset($_GET['productoId']) ? $_GET['productoId'] : '';

// Aquí conectarías a la base de datos y recuperarías la información del producto usando $productoId
// Por simplicidad, vamos a simular los detalles del producto
$nombreProducto = "Producto Ejemplo";
$precioProducto = "100";

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí recogerías y procesarías los datos del formulario
    // Por ejemplo: $nombreCliente = $_POST['nombre'];
    // No olvides validar y limpiar tus datos aquí

    // Generar un ID único para la compra
    $idCompra = uniqid('compra_');

    // Supongamos que todo es válido y procedemos a guardar la orden en la base de datos
    // Deberías usar una declaración preparada para insertar los datos

    // Mostrar un mensaje de confirmación con el ID de compra
    echo "<div>¡Gracias por tu compra! Tu ID de compra es: $idCompra</div>";
    // Aquí podrías redirigir o mostrar un mensaje de éxito
    // Para redirigir, puedes descomentar la línea siguiente y modificar la URL de destino
    // header("Location: success.php?purchaseId=$idCompra");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar Producto</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/pago.css"> <!-- Asumiendo que tienes estilos aquí -->
</head>
<body>
    <h2>Página de Pago para <?php echo htmlspecialchars($nombreProducto); ?></h2>
    <form action="pago.php?productoId=<?php echo htmlspecialchars($productoId); ?>" method="post">
        <div>
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div>
            <label for="direccion">Dirección:</label>
            <input type="text" id="direccion" name="direccion" required>
        </div>
        <!-- Agregar más campos según sea necesario -->
        <div>
            <label for="detalles">Detalles de Pago (Simulado):</label>
            <input type="text" id="detalles" name="detallesPago" placeholder="Número de tarjeta" required>
        </div>
        <div>
            <button type="submit">Confirmar Pago</button>
        </div>
    </form>
</body>
</html>

