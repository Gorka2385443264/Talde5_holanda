<?php
$statusMessage = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idCompra = $_POST['idCompra'];

    // Simulate checking the status from a database
    // Here we'll just simulate that every ID is in a "Processing" state
    $statusMessage = "El estado de tu pedido con ID '$idCompra' es: Procesando";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Estado del Pedido</title>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/estado.css"> <!-- Link to your CSS file -->
</head>
<body>
    <div class="status-form">
        <h2>Verificar el Estado del Pedido</h2>
        <form action="estado.php" method="post">
            <input type="text" id="idCompra" name="idCompra" placeholder="Introduce tu ID de compra" required>
            <button type="submit">Ver Estado</button>
        </form>
        <?php if ($statusMessage): ?>
            <div class="status-message">
                <?php echo $statusMessage; ?>
            </div>
        <?php endif; ?>
    </div>
</body>
</html>
