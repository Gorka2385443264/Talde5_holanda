<?php
// Simula obtener el ID del producto desde la URL
$productoId = isset($_GET['productoId']) ? $_GET['productoId'] : '';

// Aquí conectarías a la base de datos y recuperarías la información del producto usando $productoId
// Por simplicidad, vamos a simular los detalles del producto
$nombreProducto = "Producto Ejemplo";
$precioProducto = "100";

// Conectar a la base de datos
$servername = "localhost:3306";
$username = "root";
$password = "1WMG2023";
$dbname = "erronka3";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aquí recogerías y procesarías los datos del formulario
    $nombreCliente = $_POST['nombre'];
    $emailCliente = $_POST['email'];
    $direccionCliente = $_POST['direccion'];
    $detallesPago = $_POST['detallesPago'];

    // Limpiar y validar los datos aquí
    // ...

    // Generar un ID único para la compra
    $idCompra = uniqid('compra_');

    // Insertar datos en la base de datos
    $stmt = $conn->prepare("INSERT INTO alokairua (idCompra, nombreCliente, email, direccion, detallesPago, productoId, nombreProducto, precioProducto) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $idCompra, $nombreCliente, $emailCliente, $direccionCliente, $detallesPago, $productoId, $nombreProducto, $precioProducto);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo "<div>¡Gracias por tu compra! Tu ID de compra es: $idCompra</div>";
        // Redirigir o mostrar un mensaje de éxito
        // header("Location: success.php?purchaseId=$idCompra");
        $stmt->close();
        $conn->close();
        exit();
    } else {
        echo "Error al procesar la compra: " . $stmt->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pagar Producto</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/pago.css">
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


