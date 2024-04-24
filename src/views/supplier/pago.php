<?php
session_start(); // Asegurarse de iniciar la sesión para acceder al carrito

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

$productoId = isset($_GET['productoId']) ? $_GET['productoId'] : '';
$nombreProducto = "Producto Ejemplo"; // Simulación del nombre del producto

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['cart'])) {
    $carrito = $_SESSION['cart'];
    $nombreCliente = htmlspecialchars($_POST['nombre']);
    $emailCliente = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $direccionCliente = htmlspecialchars($_POST['direccion']);
    $detallesPago = $_POST['detallesPago'];

    foreach ($carrito as $item) {
        $id_bezeroa = $_SESSION['id']; // Suponiendo que el ID del cliente está definido o almacenado en algún lugar
        $id_bizikleta = $item['id'];
        $prezioa = $item['price'] * (isset($item['hours']) ? $item['hours'] : 1);
        $denbora = isset($item['hours']) ? $item['hours'] : 1;
        $data = date('Y-m-d H:i:s');

        $stmt = $conn->prepare("INSERT INTO alokairua (id_bezeroa, id_bizikleta, prezioa, data, denbora) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("iidsi", $id_bezeroa, $id_bizikleta, $prezioa, $data, $denbora);
        $stmt->execute();

        // Si necesitas el ID de alokairua generado automáticamente:
        $id_alokairua = $conn->insert_id;
    }

    if ($stmt->affected_rows > 0) {
        echo "<div>¡Gracias por tu compra! Tu ID de compra es: " . $id_alokairua . "</div>";
        unset($_SESSION['cart']); // Limpiar el carrito
    } else {
        echo "Error al procesar la compra: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
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
            <button type="submit">Confirm





