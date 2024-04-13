<?php
session_start();

// Check if the cart is empty or not
$carrito = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$total = 0;

// Handle item removal from cart
if (isset($_GET['remove']) && isset($carrito[$_GET['remove']])) {
    unset($carrito[$_GET['remove']]);
    $_SESSION['cart'] = $carrito; // Update the session variable
    header("Location: cesta.php"); // Redirect to refresh the page
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <?php require_once ($_SERVER["DOCUMENT_ROOT"] . "/Talde5_holanda/src/views/supplier/_parts/head.php"); ?>
    <link rel="stylesheet" href="/Talde5_holanda/src/css/main.css">
    <link rel="stylesheet" href="/Talde5_holanda/src/css/cesta.css">
    <title>Cesta de Compra</title>
</head>
<body>
    <div class="mainDiv">
        <h1>Cesta de la Compra</h1>
        <?php if (count($carrito) > 0): ?>
            <table>
                <tr>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Acción</th>
                </tr>
                <?php foreach ($carrito as $index => $item): ?>
                <tr>
                    <td><?php echo htmlspecialchars($item['name']); ?></td>
                    <td>$<?php echo number_format($item['price'], 2); ?></td>
                    <td><a href="cesta.php?remove=<?php echo $index; ?>" class="button">Eliminar</a></td>
                </tr>
                <?php $total += $item['price']; ?>
                <?php endforeach; ?>
                <tr>
                    <th>Total</th>
                    <th colspan="2">$<?php echo number_format($total, 2); ?></th>
                </tr>
            </table>
            <div>
                <a href="catalogo.php" class="button">Continuar Comprando</a>
                <a href="pago.php" class="button">Proceder al Pago</a>
            </div>
        <?php else: ?>
            <p>Tu cesta está vacía. <a href="catalogo.php">Volver al catálogo.</a></p>
        <?php endif; ?>
    </div>
    <?php require_once (APP_DIR . "/src/views/supplier/barraDeAbajo.php"); ?>
</body>
</html>

